<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman beranda atau halaman lain yang sesuai
            return redirect()->back()->with('error', 'Anda sudah login! silahkan logout');
        }
        return view('auth/register');
    }

    public function register_auth(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string|unique:users',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'sekolah' => 'required|string',
            'nama_ortu' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Cek apakah username sudah digunakan
        $existingUser = User::where('username', $request->username)->exists();
        if ($existingUser) {
            // Jika username sudah digunakan, redirect kembali dengan pesan error
            return redirect()->back()->withInput()->with('error-message', 'Username sudah digunakan.');
        }

        $user = User::create([
            'username' => $request->username,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'sekolah' => $request->sekolah,
            'nama_ortu' => $request->nama_ortu,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login')->with('registration_success', true);
    }

    public function login()
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman beranda atau halaman lain yang sesuai
            return redirect()->back();
        }
        return view('auth/login')->with('error', 'Anda sudah login! silahkan logout');;
    }

    public function login_auth(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/user/index');
        }

        // Jika login gagal
        return back()->withErrors(['username' => 'Username atau password salah!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}