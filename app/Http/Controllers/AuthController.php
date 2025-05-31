<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     */
    public function daftar()
    {
        return view('page.register');
    }

    /**
     * Menampilkan halaman selamat datang dengan data yang dikirim dari form.
     */
    public function hai(Request $request)
    {
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');

        return view('page.welcome', compact('firstname', 'lastname'));
    }

    /**
     * Logout pengguna dan redirect ke halaman film.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/film');
    }
}
