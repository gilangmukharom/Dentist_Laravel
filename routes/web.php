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
    Route::get('/user/edit-profile', [UserDashboardController::class, 'edit_profile'])->middleware('role:user')->name('user.edit-profile');

    Route::get('/user/video', [UserDashboardController::class, 'video'])->middleware('role:user')->name('user.video');
    Route::get('/user/teethq', [UserDashboardController::class, 'teethq'])->middleware('role:user')->name('user.teethq');
    Route::get('/user/info', [UserDashboardController::class, 'info'])->middleware('role:user')->name('user.info');
    Route::get('/user/info_detail', [UserDashboardController::class, 'info_detail'])->middleware('role:user')->name('user.info_detail');
    Route::get('/user/panduan', [UserDashboardController::class, 'panduan'])->middleware('role:user')->name('user.panduan');

    Route::get('/user/activity', [UserDashboardController::class, 'activity'])->middleware('role:user')->name('user.activity');
    Route::get('/user/14days', [UserDashboardController::class, 'days'])->middleware('role:user')->name('user.14days');
    Route::post('/user/create_daily', [UserDashboardController::class, 'create_daily'])->middleware('role:user')->name('user.create_daily');
    Route::post('/user/first_daily', [UserDashboardController::class, 'first_daily'])->middleware('role:user')->name('user.first_daily');
    Route::get('/user/daysactivity/{nomor}', [UserDashboardController::class, 'daysactivity'])->middleware('role:user')->name('user.daysactivity');
    Route::get('/user/daily_activity_history/{nomor}', [UserDashboardController::class, 'daysactivity'])->middleware('role:user')->name('user.daysactivity');
    Route::get('user/cetak_laporan', [UserDashboardController::class, 'generatePDF'])->middleware(('role:user'))->name('user.cetak_laporan');

    Route::get('/user/quiz', [UserDashboardController::class, 'quiz'])->middleware('role:user')->name('user.quiz');
    Route::get('/user/history-quiz', [UserDashboardController::class, 'history_quiz'])->middleware('role:user')->name('user.history_quiz');
    
    Route::get('/user/quiz_keterampilan', [UserDashboardController::class, 'quiz_keterampilan'])->middleware('role:user')->name('user.quiz_keterampilan');
    Route::post('/user/hasil_quiz_keterampilan', [UserDashboardController::class, 'hasil_quiz_keterampilan'])->middleware('role:user')->name('user.hasil_quiz_keterampilan');
    Route::get('/user/finish_keterampilan', [UserDashboardController::class, 'finish_keterampilan'])->middleware('role:user')->name('user.finish_keterampilan');
    Route::get('/user/skor_keterampilan', [UserDashboardController::class, 'skor_keterampilan'])->middleware('role:user')->name('user.skor_keterampilan');

    Route::get('/user/quiz_pengetahuan', [UserDashboardController::class, 'quiz_pengetahuan'])->middleware('role:user')->name('user.quiz_pengetahuan');
    Route::post('/user/hasil_quiz_pengetahuan', [UserDashboardController::class, 'hasil_quiz_pengetahuan'])->middleware('role:user')->name('user.hasil_quiz_pengetahuan');
    Route::get('/user/finish_pengetahuan', [UserDashboardController::class, 'finish_pengetahuan'])->middleware('role:user')->name('user.finish_pengetahuan');
    Route::get('/user/skor_pengetahuan', [UserDashboardController::class, 'skor_pengetahuan'])->middleware('role:user')->name('user.skor_pengetahuan');
    
    Route::get('/user/panduan_pretest', [UserDashboardController::class, 'panduan_pretest'])->middleware('role:user')->name('user.panduan_pretest');
    Route::get('/user/hasil_pretest', [UserDashboardController::class, 'hasil_pretest'])->middleware('role:user')->name('user.hasil_pretest');
    
    Route::get('/user/panduan_postest', [UserDashboardController::class, 'panduan_postest'])->middleware('role:user')->name('user.panduan_postest');
    Route::get('/user/postest', [UserDashboardController::class, 'postest'])->middleware('role:user')->name('user.postest');
    
    Route::get('/user/panduan_sikap', [UserDashboardController::class, 'panduan_sikap'])->middleware('role:user')->name('user.panduan_sikap');
    Route::get('/user/test_sikap', [UserDashboardController::class, 'test_sikap'])->middleware('role:user')->name('user.test_sikap');
    Route::get('/user/total_sikap', [UserDashboardController::class, 'total_sikap'])->middleware('role:user')->name('user.total_sikap');
    Route::post('/user/cek_test_sikap', [UserDashboardController::class, 'cek_test_sikap'])->middleware('role:user')->name('user.cek_test_sikap');

    Route::get('/user/postest_sikap', [UserDashboardController::class, 'postest_test_sikap'])->middleware('role:user')->name('user.postest_sikap');
    Route::get('/user/postest_total_sikap', [UserDashboardController::class, 'postest_total_sikap'])->middleware('role:user')->name('user.postest_total_sikap');
    Route::post('/user/cek_postest_sikap', [UserDashboardController::class, 'cek_postest_sikap'])->middleware('role:user')->name('user.cek_postest_sikap');
    
    Route::get('/user/panduan_tindakan', [UserDashboardController::class, 'panduan_tindakan'])->middleware('role:user')->name('user.panduan_tindakan');
    Route::get('/user/test_tindakan', [UserDashboardController::class, 'test_tindakan'])->middleware('role:user')->name('user.test_tindakan');
    Route::post('/user/test_tindakan/submit', [UserDashboardController::class, 'hasil_test_tindakan'])->middleware('role:user')->name('user.test_tindakan.submit');

    Route::get('/user/postest_tindakan', [UserDashboardController::class, 'test_tindakan'])->middleware('role:user')->name('user.postest_tindakan');
    Route::post('/user/postest_tindakan/submit', [UserDashboardController::class, 'hasil_postest_tindakan'])->middleware('role:user')->name('user.postest_tindakan.submit');
    
    Route::get('/user/test_pengetahuan', [UserDashboardController::class, 'test_pengetahuan'])->middleware('role:user')->name('user.test_pengetahuan');
    Route::post('/user/test_pengetahuan/submit', [UserDashboardController::class, 'hasil_test_pengetahuan'])->middleware('role:user')->name('user.test_pengetahuan.submit');

    Route::get('/user/postest_pengetahuan', [UserDashboardController::class, 'postest_pengetahuan'])->middleware('role:user')->name('user.postest_pengetahuan');
    Route::post('/user/postest_pengetahuan/submit', [UserDashboardController::class, 'hasil_postest_pengetahuan'])->middleware('role:user')->name('user.postest_pengetahuan.submit');

    Route::get('/admin/index', [AdminDashboardController::class, 'index'])->middleware('role:admin')->name('admin.index');
    Route::get('/admin/setting', [AdminDashboardController::class, 'setting'])->middleware('role:admin')->name('admin.setting');
    Route::get('/admin/informasi', [AdminDashboardController::class, 'informasi'])->middleware('role:admin')->name('admin.informasi');
    Route::post('/admin/delete_data', [AdminDashboardController::class, 'delete_data'])->middleware('role:admin')->name('admin.delete_data');
});