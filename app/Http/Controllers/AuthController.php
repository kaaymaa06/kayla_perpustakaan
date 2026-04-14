<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\kepala_perpus;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //namapilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    //proses login
    public function login(Request $request)
    {
        //validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //cek login
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return $this->redirectByRole(Auth::user());
        }

        //redirecy sesuai role
        return back()->with('error', 'Email atau Password salah');
    }

    //menampilkan halam register
    public function showRegister()
    {
        return view('auth.register');
    }

    //proses register
    public function register(Request $request)
    {
        //validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'nis' => 'required|unique:anggota,nis',
            'kelas' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password wajib diisi!',
            'password.min' => 'Password minimal 6 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sama!',

            'nis.required' => 'NIS wajib diisi!',
            'nis.unique' => 'NIS sudah digunakan!',
            'kelas.required' => 'Kelas wajib diisi!',
        ]);

        //buat user (anggota)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
        ]);

        //simpan ke tabel anggota
        Anggota::create([
            'user_id' => $user->id,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    //redirect sesuai role
    private function redirectByRole($user)
    {
        return match ($user->role) {
            'kepala_perpus' => redirect('/kepala/dashboard'),
            'petugas' => redirect('/petugas/dashboard'),
            default => redirect('/anggota/dashboard'),
        };
    }

    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        //hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
