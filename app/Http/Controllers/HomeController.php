<?php

namespace App\Http\Controllers;

use App\Models\ulasans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Anda sudah login! silahkan logout');;
        }

        $ulasans = ulasans::all();

        $ulasansWithUsername = DB::table('ulasans')
        ->join('users', 'ulasans.user_id', '=', 'users.id')
        ->select('ulasans.*', 'users.username')
        ->get();

        $data = [
            'ulasan' => $ulasansWithUsername
        ];

        return view('layouts/home', $data);
    }
    
    public function about()
    {
        if (Auth::check()) {
            return redirect()->back()->with('error', 'Anda sudah login! silahkan logout');;
        }

        return view('layouts/about');
    }
}