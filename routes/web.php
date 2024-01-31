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
    Route::get('/user/14days', [UserDashboardController::class, '14days'])->middleware('role:user')->name('user.14days');
    Route::get('/user/daysactivity', [UserDashboardController::class, 'daysactivity'])->middleware('role:user')->name('user.daysactivity');
    Route::get('/user/quiz', [UserDashboardController::class, 'quiz'])->middleware('role:user')->name('user.quiz');
    Route::get('/user/quiz_keterampilan', [UserDashboardController::class, 'quiz_keterampilan'])->middleware('role:user')->name('user.quiz_keterampilan');
    Route::post('/quiz/check-answer', [UserDashboardController::class, 'checkAnswer']);
    Route::get('/quiz/get-next-question/{questionNumber}', [UserDashboardController::class, 'getNextQuestion']);
    Route::get('/user/quiz_pengetahuan', [UserDashboardController::class, 'quiz_pengetahuan'])->middleware('role:user')->name('user.quiz_pengetahuan');
    Route::get('/user/finish_pengetahuan', [UserDashboardController::class, 'finish_pengetahuan'])->middleware('role:user')->name('user.finish_pengetahuan');
    Route::get('/user/finish_keterampilan', [UserDashboardController::class, 'finish_keterampilan'])->middleware('role:user')->name('user.finish_keterampilan');
    Route::get('/user/skor_keterampilan', [UserDashboardController::class, 'skor_keterampilan'])->middleware('role:user')->name('user.skor_keterampilan');
    Route::get('/user/skor_pengetahuan', [UserDashboardController::class, 'skor_pengetahuan'])->middleware('role:user')->name('user.skor_pengetahuan');


    Route::get('/admin/index', [AdminDashboardController::class, 'index'])->middleware('role:admin')->name('admin.index');
});