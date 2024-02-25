<?php

namespace App\Http\Controllers;

use App\Models\daily_activities;
use Illuminate\Support\Facades\Session;
use App\Models\jawaban_sikaps;
use App\Models\Postest_jawaban_sikaps;
use App\Models\qpengetahuans;
use App\Models\QPpengetahuans;
use App\Models\QPsikaps;
use App\Models\QPtindakans;
use App\Models\qsikaps;
use App\Models\qtindakans;
use App\Models\Quiz_keterampilans;
use App\Models\Quiz_pengetahuans;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function edit_profile()
    {
        return view('user.edit_profile');
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

    public function quiz_keterampilan(Request $request)
    {
        $q_keterampilans = Quiz_keterampilans::with('jawabans')->get();

        return view('user.quiz_keterampilan', compact('q_keterampilans'));
    }

    public function hasil_quiz_keterampilan(Request $request)
    {
        $request->validate([
            'jawabans.*' => 'required',
        ], [
            'jawabans.*.required' => 'Please select an answer for each question.',
        ]);

        $userAnswers = $request->input('jawabans');
        $correctAnswersCount = 0;
        $totalQuestions = count($userAnswers);

        foreach ($userAnswers as $questionId => $userAnswer) {
            $question = Quiz_keterampilans::find($questionId);

            if ($question) {
                $correctAnswer = $question->jawabans()->where('is_correct', true)->first();

                if ($correctAnswer && $correctAnswer->answer === $userAnswer) {
                    $correctAnswersCount++;
                }
            }
        }
        $percentage = ($correctAnswersCount / $totalQuestions) * 100;

        $user_id = Auth::id();
        $user = User::find($user_id);
        if ($user) {
            $user->total_jawaban_keterampilan = $percentage;
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }


        return view('user.finish_keterampilan', compact('percentage'));
    }

    // public function cek_quiz_keterampilan(Request $request, Quiz_keterampilans $q_keterampilans, $option)
    // {
    //     $answerData = [
    //         'answer' => $request->input("option_$option"),
    //         'is_correct' => $request->input('correct_answer') === $option,
    //     ];

    //     if ($request->hasFile("image_$option")) {
    //         $imagePath = $request->file("image_$option")->store("images/questions", "public");
    //         $answerData['image'] = $imagePath;
    //     }

    //     $q_keterampilans->answers()->create($answerData);
    // }

    public function quiz_pengetahuan()
    {
        $q_pengetahuans = Quiz_pengetahuans::with('jawabans')->get();

        return view('user.quiz_pengetahuan', compact('q_pengetahuans'));
    }

    public function hasil_quiz_pengetahuan(Request $request)
    {
        $request->validate([
            'jawabans.*' => 'required',
        ], [
            'jawabans.*.required' => 'Please select an answer for each question.',
        ]);

        $userAnswers = $request->input('jawabans');
        $correctAnswersCount = 0;
        $totalQuestions = count($userAnswers);

        foreach ($userAnswers as $questionId => $userAnswer) {
            $question = Quiz_pengetahuans::find($questionId);

            if ($question) {
                $correctAnswer = $question->jawabans()->where('is_correct', true)->first();

                if ($correctAnswer && $correctAnswer->answer === $userAnswer) {
                    $correctAnswersCount++;
                }
            }
        }
        $percentage = ($correctAnswersCount / $totalQuestions) * 100;

        $user_id = Auth::id();
        $user = User::find($user_id);
        if ($user) {
            $user->total_jawaban_pengetahuan = $percentage;
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }


        return view('user.finish_pengetahuan', compact('percentage'));
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
        $user_id = Auth::id();
        $user = User::find($user_id);

        // Periksa apakah pengguna sudah mengisi tes pengetahuan
        if ($user && $user->total_jawaban_pengetahuan > 0) {
            // Pengguna sudah mengisi tes, maka arahkan ke halaman lain atau tampilkan pesan
            return redirect()->route('user.hasil_pretest')->with('warning', 'Anda sudah mengisi tes pengetahuan.');
        }
        return view('user.panduan_pretest');
    }

    public function hasil_pretest()
    {
        $user = Auth::user();

        // Mendapatkan nilai dari field username
        $username = $user->username;
        $tanggal_pretest = $user->tanggal_pretest;
        $skor_sikap = $user->total_jawaban_sikap;
        $skor_tindakan = $user->total_jawaban_tindakans;
        $skor_pengetahuan = $user->total_jawaban_pengetahuan;

        if ($skor_sikap >= 80) {
            $kategori_sikap = 'Sangat Baik';
        } elseif ($skor_sikap >= 60) {
            $kategori_sikap = 'Baik';
        } elseif ($skor_sikap >= 50) {
            $kategori_sikap = 'Cukup';
        } else {
            $kategori_sikap = 'Kurang';
        }

        if ($skor_tindakan >= 80) {
            $kategori_tindakan = 'Sangat Baik';
        } elseif ($skor_tindakan >= 60) {
            $kategori_tindakan = 'Baik';
        } elseif ($skor_tindakan >= 50) {
            $kategori_tindakan = 'Cukup';
        } else {
            $kategori_tindakan = 'Kurang';
        }

        if ($skor_pengetahuan >= 80) {
            $kategori_pengetahuan = 'Sangat Baik';
        } elseif ($skor_pengetahuan >= 60) {
            $kategori_pengetahuan = 'Baik';
        } elseif ($skor_pengetahuan >= 50) {
            $kategori_pengetahuan = 'Cukup';
        } else {
            $kategori_pengetahuan = 'Kurang';
        }

        // Mengirim data username ke view
        return view('user.hasil_pretest', compact('username', 'tanggal_pretest', 'skor_sikap', 'kategori_sikap', 'kategori_tindakan', 'kategori_pengetahuan'));
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
        $totalQuestions = count($pertanyaans);

        foreach ($pertanyaans as $questionId => $selectedOption) {
            $pertanyaan = qpengetahuans::findOrFail($questionId);
            if ($selectedOption === $pertanyaan->jawaban_benar) {
                $correctAnswers++;
            }
        }

        // Temukan user
        $user = User::find($user_id);
        $user->tanggal_pretest = Carbon::now();
        $percentage = ($correctAnswers / $totalQuestions) * 100;

        // Pastikan user ditemukan sebelum menyimpan data
        if ($user) {
            // Tambahkan jumlah jawaban yang benar
            $user->total_jawaban_pengetahuan += $percentage;

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

    public function postest_pengetahuan()
    {
        $pertanyaans = QPpengetahuans::all();
        return view('user.postest_pengetahuan', compact('pertanyaans'));
    }

    public function hasil_postest_pengetahuan(Request $request)
    {
        $user_id = Auth::id();
        $pertanyaans = $request->input('pertanyaan');
        $correctAnswers = 0;
        $totalQuestions = count($pertanyaans);

        foreach ($pertanyaans as $questionId => $selectedOption) {
            $pertanyaan = QPpengetahuans::findOrFail($questionId);
            if ($selectedOption === $pertanyaan->jawaban_benar) {
                $correctAnswers++;
            }
        }

        // Temukan user
        $user = User::find($user_id);
        $percentage = ($correctAnswers / $totalQuestions) * 100;
        $user->tanggal_postest = Carbon::now();

        // Pastikan user ditemukan sebelum menyimpan data
        if ($user) {
            // Tambahkan jumlah jawaban yang benar
            $user->total_jawaban_pengetahuan += $percentage;

            // Simpan perubahan ke database
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        return redirect('user/postest_pengetahuan');
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

    public function postest_sikap()
    {
        $test_sikaps = QPsikaps::all();
        return view('user/test_sikap', compact('test_sikaps'));
    }

    public function cek_postest_sikap(Request $request)
    {
        $user_id = Auth::id();
        $jawaban = $request->input('jawaban');

        foreach ($jawaban as $qsikaps_id => $jawab) {
            Postest_jawaban_sikaps::create([
                'qsikaps_id' => $qsikaps_id,
                'user_id' => $user_id,
                'jawaban' => $jawab
            ]);
        }

        $total_jawaban = Postest_jawaban_sikaps::where('user_id', $user_id)->sum('jawaban');

        $user = User::find($user_id);
        $user->total_postest_jawaban_sikap = $total_jawaban;
        $user->save();

        return redirect('user/test_sikap');
    }

    public function postest_total_sikap()
    {
        $user_id = Auth::id();

        // Mengambil total jawaban dari basis data menggunakan model User
        $totalJawaban = User::find($user_id)->postest_jawaban_sikap;

        // Mengirim total jawaban ke view untuk ditampilkan
        return view('user/total_sikap', ['totalJawaban' => $totalJawaban]);
    }

    public function panduan_tindakan()
    {
        return view('user.panduan_tindakan');
    }

    public function test_tindakan()
    {
        $pertanyaans = qtindakans::all();
        return view('user/test_tindakan', compact('pertanyaans'));
    }

    public function hasil_test_tindakan(Request $request)
    {
        $user_id = Auth::id();
        $pertanyaans = $request->input('pertanyaan');
        $correctAnswers = 0;
        $totalQuestions = count($pertanyaans);

        foreach ($pertanyaans as $questionId => $selectedOption) {
            $pertanyaan = qtindakans::findOrFail($questionId);
            if ($selectedOption === $pertanyaan->jawaban_benar) {
                $correctAnswers++;
            }
        }

        // Temukan user
        $user = User::find($user_id);
        $percentage = ($correctAnswers / $totalQuestions) * 100;

        // Pastikan user ditemukan sebelum menyimpan data
        if ($user) {
            // Tambahkan jumlah jawaban yang benar
            $user->total_jawaban_tindakans += $percentage;

            // Simpan perubahan ke database
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        return redirect('user/test_tindakan');
    }
    public function postest_tindakan()
    {
        $pertanyaans = QPtindakans::all();
        return view('user/postest_tindakan', compact('pertanyaans'));
    }

    public function hasil_postest_tindakan(Request $request)
    {
        $user_id = Auth::id();
        $pertanyaans = $request->input('pertanyaan');
        $correctAnswers = 0;
        $totalQuestions = count($pertanyaans);

        foreach ($pertanyaans as $questionId => $selectedOption) {
            $pertanyaan = QPtindakans::findOrFail($questionId);
            if ($selectedOption === $pertanyaan->jawaban_benar) {
                $correctAnswers++;
            }
        }

        // Temukan user
        $user = User::find($user_id);
        $percentage = ($correctAnswers / $totalQuestions) * 100;

        // Pastikan user ditemukan sebelum menyimpan data
        if ($user) {
            // Tambahkan jumlah jawaban yang benar
            $user->total_postest_jawaban_tindakans += $percentage;

            // Simpan perubahan ke database
            $user->save();

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        return redirect('user/postest_tindakan');
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