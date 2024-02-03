<?php

namespace App\Http\Controllers;

use App\Models\Pretest;
use App\Models\Questions;
use App\Models\Soal_keterampilan;
use Illuminate\Http\Request;

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
        $questions = Questions::inRandomOrder()->limit(1)->first(); // Ambil pertanyaan secara acak
        return view('user/quiz_keterampilan', compact('questions'));
    }

    public function checkAnswer(Request $request)
    {
        $question = Questions::findOrFail($request->question_id);

        // Mengambil jawaban benar dari database
        $correctAnswer = $question->correct_option;

        // Mendapatkan jawaban yang dikirimkan oleh pengguna
        $selectedOption = $request->selected_option;

        // Memeriksa apakah jawaban yang dikirimkan benar atau salah
        $isCorrect = ($selectedOption == $correctAnswer);

        // Mengembalikan respons JSON dengan status jawaban benar atau salah
        return response()->json(['correct' => $isCorrect]);
    }

    public function getNextQuestion($questionNumber)
    {
        $nextQuestion = Questions::find($questionNumber);

        if (!$nextQuestion) {
            return response()->json(['error' => 'Question not found'], 404);
        }

        return response()->json([
            'question' => $nextQuestion->question,
            'image_path1' => asset('assets/img/pengetahuan/' . $nextQuestion->image_path),
            'image_path2' => asset('assets/img/pengetahuan/' . $nextQuestion->image_path2),
        ]);
    }

    public function getNextRandomQuestion(Request $request)
    {
        $answeredQuestions = $request->answered_questions;

        // Ambil pertanyaan secara acak yang belum pernah muncul
        $nextQuestion = Questions::whereNotIn('id', $answeredQuestions)
            ->inRandomOrder()
            ->first();

        if (!$nextQuestion) {
            return response()->json(['error' => 'All questions answered'], 404);
        }

        return response()->json(['question_id' => $nextQuestion->id]);
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

    public function pretest()
    {
        $pretests = Pretest::all();
        return view('user.pretest', compact('pretests'));
    }

    public function hasil_pretest()
    {
        $percentageScore = session('pretest_score');

        return view('user.finish_pengetahuan', compact('percentageScore'));
    }

    public function cek_pretest(Request $request)
    {
        $answers = $request->input('answers');
        $result = '';
        $score = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $answer) {
            $pretests = Pretest::find($answer['question_id']);

            if ($pretests->correct_answer === $answer['answer']) {
                $score++;
            }
        }

        $percentageScore = ($score / $totalQuestions) * 100;

        session(['pretest_score' => $percentageScore]);
        $result .= '<br>Skor Anda:<br>';
        $result .= $percentageScore . '%';
        // return response()->json(['result' => $result, 'score' => $score]);
        return response()->json(['result' => $result, 'percentage_score' => $percentageScore]);
    }

    public function panduan_sikap()
    {
        return view('user.panduan_sikap');
    }

    public function test_sikap()
    {
        return view('user.test_sikap');
    }

    public function panduan_tindakan()
    {
        return view('user.panduan_tindakan');
    }

    public function test_tindakan()
    {
        return view('user.test_tindakan');
    }

    public function panduan_debris()
    {
        return view('user.panduan_debris');
    }

    public function test_debris()
    {
        return view('user.test_debris');
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