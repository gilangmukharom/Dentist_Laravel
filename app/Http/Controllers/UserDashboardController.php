<?php

namespace App\Http\Controllers;

use App\Models\daily_activities;
use App\Models\jawaban_pengetahuans;
use App\Models\Jawaban_quiz_keterampilan;
use App\Models\Jawaban_quiz_keterampilans;
use Illuminate\Support\Facades\Session;
use App\Models\jawaban_sikaps;
use App\Models\qpengetahuans;
use App\Models\qsikaps;
use App\Models\Quiz_keterampilan;
use App\Models\Quiz_keterampilans;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function activity()
    {
        return view('user.activity');
    }

    public function daily_activities()
    {
        $schedules = daily_activities::where('user_id', Auth::id())->get();
        return view('user.daily_activitiy_index', compact('schedules'));
    }

    public function views_create_daily()
    {
        return view('user.daysactivity');
    }

    public function create_daily(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'waktu_sikat_gigi_pagi' => 'required|date_format:H:i',
            'waktu_sikat_gigi_malam' => 'required|date_format:H:i',
            'bukti' => 'required|image|max:2048', // maksimal ukuran 2MB
            'deskripsi' => 'nullable|string',
        ]);

        $userId = Auth::id();

        $existingActivitiesCount = daily_activities::where('user_id', $userId)->count();

        $newDayValue = ($existingActivitiesCount % 14) + 1;

        $bukti = $request->file('bukti')->store('bukti_sikat_gigi');

        $schedule = new daily_activities();
        $schedule->user_id = Auth::id();
        $schedule->nama = $request->nama;
        $schedule->waktu_sikat_gigi_pagi = $request->waktu_sikat_gigi_pagi;
        $schedule->waktu_sikat_gigi_malam = $request->waktu_sikat_gigi_malam;
        $schedule->bukti = $bukti;
        $schedule->deskripsi = $request->deskripsi;
        $schedule->day = $newDayValue;
        $schedule->save();

        return redirect()->route('user.14days')->with('success', 'Jadwal berhasil dibuat.');
    }

    public function teethq()
    {
        return view('user.teethq');
    }
    public function info()
    {
        return view('user.info');
    }
    public function info_detail()
    {
        return view('user.info_detail');
    }
    public function panduan()
    {
        return view('user.panduan');
    }
    public function video()
    {
        return view('user.video');
    }
    public function days()
    {
        return view('user.14days');
    }
    public function daysactivity()
    {
        return view('user.daysactivity');
    }
    public function quiz()
    {
        return view('user.quiz');
    }
    
    public function quiz_keterampilan()
    {
        $q_keterampilans = Quiz_keterampilans::with('jawaban')->first(); // Ambil pertanyaan pertama
        return view('user.quiz_keterampilan', compact('q_keterampilans'));
    }

    public function next_quiz_keterampilan($currentQuestionId)
    {
        $nextQuestion = Quiz_keterampilans::where('id', '>', $currentQuestionId)->first();
        $nextQuestion->load('jawaban');

        return $nextQuestion;
    }

    public function cek_quiz_keterampilan(Request $request)
    {
        $userAnswerId = $request->input('jawaban');
        $jawaban = Jawaban_quiz_keterampilans::find($userAnswerId);

        $isCorrect = $jawaban->jawaban_benar;

        // Memperbarui total jawaban keterampilan pengguna yang sedang masuk
        if ($isCorrect) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            $user->update([
                'total_jawaban_keterampilan' => $user->total_jawaban_keterampilan + 1
            ]);

            return redirect()->back()->with('correct_answer', true);
        } else {
            return redirect()->back()->with('incorrect_answer', true);
        }
    }
    
    public function quiz_pengetahuan()
    {
        return view('user.quiz_pengetahuan');
    }
    public function finish_pengetahuan()
    {
        return view('user.finish_pengetahuan');
    }
    public function finish_keterampilan()
    {
        return view('user.finish_keterampilan');
    }
    public function skor_keterampilan()
    {
        return view('user.skor_keterampilan');
    }
    public function skor_pengetahuan()
    {
        return view('user.skor_pengetahuan');
    }

    public function panduan_pretest()
    {
        return view('user.panduan_pretest');
    }

    public function test_pengetahuan()
    {
        $pertanyaans = qpengetahuans::all();
        return view('user.test_pengetahuan', compact('pertanyaans'));
    }

    public function hasil_test_pengetahuan(Request $request)
    {
        $user_id = Auth::id();
        $pertanyaans = $request->input('pertanyaan');
        $correctAnswers = 0;

        foreach ($pertanyaans as $questionId => $selectedOption) {
            $pertanyaan = qpengetahuans::findOrFail($questionId);
            if ($selectedOption === $pertanyaan->jawaban_benar) {
                $correctAnswers++;
            }
        }

        // Temukan user
        $user = User::find($user_id);

        // Pastikan user ditemukan sebelum menyimpan data
        if ($user) {
            // Tambahkan jumlah jawaban yang benar
            $user->total_jawaban_pengetahuan += $correctAnswers;

            // Simpan perubahan ke database
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        return redirect('user/test_pengetahuan');
    }

    public function panduan_sikap()
    {
        return view('user.panduan_sikap');
    }

    public function test_sikap()
    {
        $test_sikaps = qsikaps::all();
        return view('user/test_sikap', compact('test_sikaps'));
    }

    public function cek_test_sikap(Request $request)
    {
        $user_id = Auth::id();
        $jawaban = $request->input('jawaban');

        foreach ($jawaban as $qsikaps_id => $jawab) {
            jawaban_sikaps::create([
                'qsikaps_id' => $qsikaps_id,
                'user_id' => $user_id,
                'jawaban' => $jawab
            ]);
        }

        $total_jawaban = jawaban_sikaps::where('user_id', $user_id)->sum('jawaban');

        $user = User::find($user_id);
        $user->total_jawaban_sikap = $total_jawaban;
        $user->save();

        return redirect('user/test_sikap');
    }

    public function total_sikap()
    {
        $user_id = Auth::id();

        // Mengambil total jawaban dari basis data menggunakan model User
        $totalJawaban = User::find($user_id)->total_jawaban_sikap;

        // Mengirim total jawaban ke view untuk ditampilkan
        return view('user/total_sikap', ['totalJawaban' => $totalJawaban]);
    }

    public function panduan_tindakan()
    {
        return view('user.panduan_tindakan');
    }

    public function test_tindakan()
    {
        return view('user.test_tindakan');
    }

    public function panduan_postest()
    {
        return view('user.panduan_postest');
    }

    public function postest()
    {
        return view('user.postest');
    }
}