<?php

namespace App\Http\Middleware;

use Closure;

// Memanggil - Untuk Mengecek Authentication Yang Sedang Dia jalankan, Karena Sudah Login Berarti Fungsi Auth Ini
// Bisa Kita Panggil
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Membuat Middleware Untuk Admin - Sederhana Sudah Cukup
        // Misalkan Kalian Pengen Lebih Lengkap => laravel Permission (Spatie Github)

        // Membuat Pengecekan Dimana, Misalkan Dia User Nya Admin, Kalau Admin Boleh Lewat, Kalau Bukan Admin
        // Di Direct Ke Halaman Utama

        // Ini Bisa Di Custom Juga, Kalau Kalian Mau Membuat Action Tertentu, Kita Buat Sederhana Aja

        // Apakah Teraunthentication Atau Tidak
        // -> Memanggil Field roles, Kita Cek Apakah Dia Admin Atau Bukan
        if(Auth::user() && Auth::user()->roles == 'ADMIN') {
            // Dia Sudah Login Dan Dia Admin
            return $next($request);
        }

        // Bukan Admin, Kita Lempar Ke Halaman Utama Biar Dia Tidak Boleh Masuk
        return redirect('/');

    }
}
