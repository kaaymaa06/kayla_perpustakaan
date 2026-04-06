<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // 🔥 pakai LEVEL (punya kamu)
            if ($user->level == 'kepala') {
                return redirect()->route('kepala.dashboard');
            } elseif ($user->level == 'petugas') {
                return redirect()->route('petugas.dashboard');
            } elseif ($user->level == 'anggota') {
                return redirect()->route('anggota.dashboard');
            }
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
