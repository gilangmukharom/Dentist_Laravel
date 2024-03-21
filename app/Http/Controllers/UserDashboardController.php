<?php

namespace App\Http\Controllers;

use App\Charts\dailyChart;
use App\Charts\teethqChart;
use App\Models\daily_activities;
use App\Models\Daily_cores;
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
use App\Models\User_quiz_keterampilans;
use App\Models\User_quiz_pengetahuans;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Collection;

class UserDashboardController extends Controller
{
    public function index(teethqChart $chart, dailyChart $chart2)
    {
        $users = User::paginate(10);
        $user_id = Auth::user();
        $username = $user_id->username;

        // Cek apakah ada data pengguna
        if ($users->isEmpty()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Iterasi melalui setiap pengguna untuk mendapatkan data dan kategorinya
        $userData = [];
        foreach ($users as $user) {
            $skor_daily = Daily_cores::where('user_id', $user->id)->count('tanggal_input');
            $skor_daily_total = $skor_daily / 16 * 100;

            // $jumlah_jawaban_id = $user->total_jawaban_sikap;
            $skor_sikap = jawaban_sikaps::where('user_id', $user->id)->sum('jawaban');
            $jumlah_jawaban_id = jawaban_sikaps::where('user_id', $user->id)->count('jawaban');
            $skor_sikap_total = ($jumlah_jawaban_id != 0) ? ($skor_sikap / $jumlah_jawaban_id * 100 / 4) : 0;

            $skor_tindakan = $user->total_jawaban_tindakans;
            $skor_pengetahuan = $user->total_jawaban_pengetahuan;

            if ($skor_sikap_total >= 80) {
            $kategori_sikap = 'Sangat Baik';
            } elseif ($skor_sikap_total >= 60) {
            $kategori_sikap = 'Baik';
            } elseif ($skor_sikap_total >= 50) {
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

            if ($skor_daily_total >= 80) {
                $kategori_daily = 'Sangat Baik';
            } elseif ($skor_daily_total >= 60) {
                $kategori_daily = 'Baik';
            } elseif ($skor_daily_total >= 50) {
                $kategori_daily = 'Cukup';
            } else {
                $kategori_daily = 'Kurang';
            }

            $rata_rata_kategori = ($skor_sikap_total + $skor_tindakan + $skor_pengetahuan + $skor_daily_total) / 4;

            // Menyimpan data pengguna dan kategorinya dalam bentuk array
            $userData[] = [
                'username' => $user->username,
                'user' => $user,
                'rata_rata_kategori' => $rata_rata_kategori,
                'kategori_daily' => $kategori_daily,
                'kategori_sikap' => $kategori_sikap,
                'skor_sikap_total' => $skor_sikap_total,
                'kategori_tindakan' => $kategori_tindakan,
                'kategori_pengetahuan' => $kategori_pengetahuan,
            ];
        }

        $userDataCollection = new Collection($userData);
        $sortedUserData = $userDataCollection->sortByDesc('rata_rata_kategori')->values()->all();

        $cek_pretest = User::where('id', Auth::id())->first()->tanggal_pretest;
        if ($cek_pretest == null) {
            return view('user.panduan_pretest', compact('users'));
        } else {
            $user_id = Auth::id();

            $todays = \Carbon\Carbon::now()->format('Y-m-d');
            $cek_input_daily = Daily_cores::where('user_id', $user_id)
                ->whereDate('tanggal_input', $todays)
                ->exists();

            if ($cek_input_daily) {
                session()->flash('success', 'Anda sudah mengisi daily activity.');
            } else {
                session()->flash('error', 'Anda belum mengisi daily activity.');
            }

            return view('user.index', [
                'chart' => $chart->build(),
                'chart2' => $chart2->build(),
                'userData' => $sortedUserData,
                'users' => $users,
                'cek_input_daily' => $cek_input_daily,
                'username' => $username,
            ]);
        }

        // Mengirim data pengguna ke view
        // return view('user.index', [
        //     'chart' => $chart->build(),
        //     'chart2' => $chart2->build(),
        //     'userData' => $sortedUserData,
        //     'users' => $users,
        //     'cek_input_daily' => $cek_input_daily,
        // ]);
    }


    public function generatePDF()
    {
        // Ambil data dari model
        $data = Daily_cores::all();

        // Buat objek Dompdf
        $pdf = new Dompdf();

        // Atur opsi Dompdf jika diperlukan
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // Render tampilan PDF
        $pdf->loadHtml(view('user.cetak_laporan', compact('data')));

        // Render PDF
        $pdf->render();

        // Unduh PDF
        return $pdf->stream('nama_file.pdf');
    }

    public function edit_profile()
    {

        return view('user.edit_profile');
    }

    public function update_profile(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
            'nama_ortu' => 'required|string|max:255',
        ]);

        $user->username = $request->username;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->password = bcrypt($request->password); // Encrypt password baru
        $user->alamat = $request->alamat;
        $user->sekolah = $request->sekolah;
        $user->nama_ortu = $request->nama_ortu;

        return view('user.edit_profile');
    }

    public function activity()
    {
        $schedules = Daily_cores::where('user_id', Auth::id())->get();
        return view('user.activity', compact('schedules'));
    }

    public function daily_activities()
    {
        $schedules = daily_activities::where('user_id', Auth::id())->get();
        return view('user.daily_activitiy_index', compact('schedules'));
    }

    public function create_daily(Request $request)
    {
        $nomor = session('nomor');

        $user_id = auth()->id();
        $username = auth()->user()->username;

        $tanggal_daily = Carbon::today();
        $bukti = $request->file('bukti')->store('img', 'public');

        $request->validate([
            'waktu_sikat_gigi_pagi' => 'required|date_format:H:i',
            'waktu_sikat_gigi_malam' => 'required|date_format:H:i',
            'bukti' => 'required|image', // maksimal ukuran 2MB
            'deskripsi' => 'nullable|string',
        ]);

        $dailyCore = Daily_cores::where('nomor', $nomor)
        ->where('tanggal_daily', $tanggal_daily)
        ->first();

        if ($dailyCore) {
            // Update kolom-kolom yang diperlukan
            $dailyCore->user_id = $user_id;
            $dailyCore->nama = $username;
            $dailyCore->bukti = $bukti;
            $dailyCore->waktu_sikat_gigi_pagi = $request->waktu_sikat_gigi_pagi;
            $dailyCore->waktu_sikat_gigi_malam = $request->waktu_sikat_gigi_malam;
            $dailyCore->tanggal_input = Carbon::now();
            $dailyCore->deskripsi = $request->deskripsi;
            $dailyCore->save();

            return redirect()->back()->with('success', 'Data Berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Data tidak ditemukan.'])->withInput();
        }
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
        $user_id = auth()->id();
        $user = User::find($user_id);

        if ($user) {
            $dailyCores = $user->Daily_cores;
            if ($dailyCores && $dailyCores->whereNotNull('tanggal_input')->first()) {
                return view('user.14days', compact('dailyCores'));
            } else {
                return view('user.activity');
            }
        } else {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    public function first_daily(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'bukti' => 'file',
            'waktu_sikat_gigi_pagi' => 'required|date_format:H:i',
            'waktu_sikat_gigi_malam' => 'required|date_format:H:i',
            'deskripsi' => 'required|string',
            'user_id' => 'exists:users,id',
        ]);

        $user_id = auth()->id();
        $user = User::find($user_id);

        $daily = Daily_cores::create([
            'user_id' => $user->id,
            'tanggal_input' => Carbon::now()->toDateString(),
            'tanggal_daily' => Carbon::now()->toDateString(),
            'deskripsi' => $request->deskripsi,
            'nomor' => 1,
            'bukti' => $request->bukti,
            'waktu_sikat_gigi_pagi' => $request->waktu_sikat_gigi_pagi,
            'waktu_sikat_gigi_malam' => $request->waktu_sikat_gigi_malam,
            'nama' => $request->nama
        ]);

        $nomor = 1;

        for ($i = 2; $i <= 14; $i++) {
            Daily_cores::create([
                'user_id' => $user->id,
                'tanggal_daily' => Carbon::now()->addDays($i - 1)->toDateString(),
                'nomor' => ++$nomor
            ]);
        }

        return redirect()->route('user.14days');
    }

    public function daysactivity($nomor)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        $dailyCore = Daily_cores::where('nomor', $nomor)
            ->whereNotNull('tanggal_input')
            ->first();

        $doneDaily = Daily_cores::where('nomor', $nomor)
            ->where('user_id', Auth::id())
            ->get();

        if ($dailyCore == NULL) {
            session()->put('nomor', $nomor);
            return view('user.daysactivity', ['nomor' => $nomor], compact('dailyCore'));
        } else {
            session()->flash('error', 'Anda sudah mengisi daily activity.');
            return view('user.daily_activity_history', ['nomor' => $nomor], compact('doneDaily'));
        }
    }

    public function quiz()
    {
        return view('user.quiz');
    }
    public function history_quiz()
    {
        $user_id = auth()->id();
        $user = User::find($user_id);

        $quizKeterampilan = $user->quiz_keterampilan;
        return view('user.history_quiz', compact('user', 'quizKeterampilan'));
    }

    public function quiz_keterampilan(Request $request)
    {
        $q_keterampilans = Quiz_keterampilans::with('jawabans')->inRandomOrder()->limit(5)->get();

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

        $id_user = Auth::id();
        $user = User::find($id_user);
        if ($user) {

            $quiz_keterampilan = new User_quiz_keterampilans([
                'nilai_quiz_keterampilan' => $percentage,
                'tanggal_quiz_keterampilan' => Carbon::now(),
            ]);

            $user->quiz_keterampilan()->save($quiz_keterampilan);

            // Menampilkan alert jika berhasil disimpan
            Session::flash('success', 'Data berhasil disimpan!');
        } else {
            // Menampilkan alert jika user tidak ditemukan
            Session::flash('error', 'User tidak ditemukan.');
        }

        return view('user.finish_keterampilan', compact('percentage'));
    }

    public function quiz_pengetahuan()
    {
        $q_pengetahuans = Quiz_pengetahuans::with('jawabans')->inRandomOrder()->limit(5)->get();

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

        $id_user = Auth::id();
        $user = User::find($id_user);
        if ($user) {

            $quiz_pengetahuan = new User_quiz_pengetahuans([
                'nilai_quiz_pengetahuan' => $percentage,
                'tanggal_quiz_pengetahuan' => Carbon::now(),
            ]);

            $user->quiz_pengetahuan()->save($quiz_pengetahuan);

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