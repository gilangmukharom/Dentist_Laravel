<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        foreach ($roles as $role) {
            if (auth()->user()->role == $role) {
                return $next($request);
            }
        }

        return redirect('/admin/index/');
    }

    // public function handle($request, Closure $next, ...$roles)
    // {
    //     // Jika pengguna tidak terautentikasi, alihkan ke halaman login
    //     if (!Auth::check()) {
    //         return redirect('/login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
    //     }

    //     // Jika pengguna memiliki peran yang sesuai, lanjutkan dengan permintaan
    //     foreach ($roles as $role) {
    //         if (Auth::user()->role == $role) {
    //             return $next($request);
    //         }
    //     }

    //     return redirect('/login')->withErrors(['error' => 'Akses ditolak. Anda harus login terlebih dahulu.']);
    // }
}