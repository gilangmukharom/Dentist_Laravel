<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Anda sudah login! silahkan logout');;
        }

        return view('layouts/home');
    }
    public function about()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Anda sudah login! silahkan logout');;
        }

        return view('layouts/about');
    }
}