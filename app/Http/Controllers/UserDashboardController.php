<?php

namespace App\Http\Controllers;

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
        return view('user.quiz_keterampilan');
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
}
