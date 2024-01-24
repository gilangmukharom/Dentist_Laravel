<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/error', 'errorPage')->name('error');
});

Route::controller(AdminDashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});

Route::controller(UserDashboardController::class)->group(function () {
    Route::get('/user/index', 'index')->name('user.index');
    Route::get('/user/video', 'video')->name('user.video');
    Route::get('/user/teethq', 'teethq')->name('user.teethq');
    Route::get('/user/info', 'info')->name('user.info');
    Route::get('/user/info_detail', 'info_detail')->name('user.info_detail');
    Route::get('/user/panduan', 'panduan')->name('user.panduan');
    Route::get('/user/activity', 'activity')->name('user.activity');
    Route::get('/user/14days', 'days')->name('user.14days');
    Route::get('/user/daysactivity', 'daysactivity')->name('user.daysactivity');
    Route::get('/user/quiz', 'quiz')->name('user.quiz');
    Route::get('/user/quiz_keterampilan', 'quiz_keterampilan')->name('user.quiz_keterampilan');
    Route::get('/user/quiz_pengetahuan', 'quiz_pengetahuan')->name('user.quiz_pengetahuan');
    Route::get('/user/finish_pengetahuan', 'finish_pengetahuan')->name('user.finish_pengetahuan');
    Route::get('/user/finish_keterampilan', 'finish_keterampilan')->name('user.finish_keterampilan');
    Route::get('/user/skor_keterampilan', 'skor_keterampilan')->name('user.skor_keterampilan');
    Route::get('/user/skor_pengetahuan', 'skor_pengetahuan')->name('user.skor_pengetahuan');
});