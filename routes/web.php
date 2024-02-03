<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register_auth', [AuthController::class, 'register_auth'])->name('register_auth');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_auth', [AuthController::class, 'login_auth'])->name('login_auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/error', 'errorPage')->name('error');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/user/index', [UserDashboardController::class, 'index'])->middleware('role:user')->name('user.index');
    Route::get('/user/video', [UserDashboardController::class, 'video'])->middleware('role:user')->name('user.video');
    Route::get('/user/teethq', [UserDashboardController::class, 'teethq'])->middleware('role:user')->name('user.teethq');
    Route::get('/user/info', [UserDashboardController::class, 'info'])->middleware('role:user')->name('user.info');
    Route::get('/user/info_detail', [UserDashboardController::class, 'info_detail'])->middleware('role:user')->name('user.info_detail');
    Route::get('/user/panduan', [UserDashboardController::class, 'panduan'])->middleware('role:user')->name('user.panduan');
    Route::get('/user/activity', [UserDashboardController::class, 'activity'])->middleware('role:user')->name('user.activity');
    Route::get('/user/14days', [UserDashboardController::class, 'days'])->middleware('role:user')->name('user.14days');
    Route::get('/user/daysactivity', [UserDashboardController::class, 'daysactivity'])->middleware('role:user')->name('user.daysactivity');
    Route::get('/user/quiz', [UserDashboardController::class, 'quiz'])->middleware('role:user')->name('user.quiz');
    Route::get('/user/quiz_keterampilan', [UserDashboardController::class, 'quiz_keterampilan'])->middleware('role:user')->name('user.quiz_keterampilan');
    Route::post('/quiz/check-answer', [UserDashboardController::class, 'checkAnswer']);
    Route::get('/quiz/get-next-question/{questionNumber}', [UserDashboardController::class, 'getNextQuestion']);
    Route::get('/quiz/get-next-random-question', [UserDashboardController::class, 'getNextRandomQuestion']);
    Route::get('/user/quiz_pengetahuan', [UserDashboardController::class, 'quiz_pengetahuan'])->middleware('role:user')->name('user.quiz_pengetahuan');
    Route::get('/user/finish_pengetahuan', [UserDashboardController::class, 'finish_pengetahuan'])->middleware('role:user')->name('user.finish_pengetahuan');
    Route::get('/user/finish_keterampilan', [UserDashboardController::class, 'finish_keterampilan'])->middleware('role:user')->name('user.finish_keterampilan');
    Route::get('/user/skor_keterampilan', [UserDashboardController::class, 'skor_keterampilan'])->middleware('role:user')->name('user.skor_keterampilan');
    Route::get('/user/skor_pengetahuan', [UserDashboardController::class, 'skor_pengetahuan'])->middleware('role:user')->name('user.skor_pengetahuan');
    Route::get('/user/panduan_pretest', [UserDashboardController::class, 'panduan_pretest'])->middleware('role:user')->name('user.panduan_pretest');
    Route::get('/user/pretest', [UserDashboardController::class, 'pretest'])->middleware('role:user')->name('user.pretest');
    Route::post('/user/cek_pretest', [UserDashboardController::class, 'cek_pretest'])->middleware('role:user')->name('user.cek_pretest');
    Route::get('/user/hasil_pretest', [UserDashboardController::class, 'hasil_pretest'])->middleware('role:user')->name('user.hasil_pretest');
    Route::get('/user/panduan_postest', [UserDashboardController::class, 'panduan_postest'])->middleware('role:user')->name('user.panduan_postest');
    Route::get('/user/postest', [UserDashboardController::class, 'postest'])->middleware('role:user')->name('user.postest');
    Route::get('/user/panduan_sikap', [UserDashboardController::class, 'panduan_sikap'])->middleware('role:user')->name('user.panduan_sikap');
    Route::get('/user/test_sikap', [UserDashboardController::class, 'test_sikap'])->middleware('role:user')->name('user.test_sikap');
    Route::get('/user/panduan_tindakan', [UserDashboardController::class, 'panduan_tindakan'])->middleware('role:user')->name('user.panduan_tindakan');
    Route::get('/user/test_tindakan', [UserDashboardController::class, 'test_tindakan'])->middleware('role:user')->name('user.test_tindakan');
    Route::get('/user/panduan_debris', [UserDashboardController::class, 'panduan_debris'])->middleware('role:user')->name('user.panduan_debris');
    Route::get('/user/test_debris', [UserDashboardController::class, 'test_debris'])->middleware('role:user')->name('user.test_debris');


    Route::get('/admin/index', [AdminDashboardController::class, 'index'])->middleware('role:admin')->name('admin.index');
});