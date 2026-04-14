<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //menampilkan dashboard petugas
    public function index()
    {
        return view('petugas.dashboard', [

            //total buku
            'totalBuku' => Buku::count(),

            //total anggota
            'totalAnggota' => User::where('role', 'anggota')->count(),

            //total peminjaman aktif
            'totalPeminjaman' => Peminjaman::where('status', 'dipinjam')->count(),

            //total keterlambatan
            'totalTerlambat' => Peminjaman::where('status', 'dipinjam')
                ->where('jatuh_tempo', '<', Carbon::now())
                ->count(),

            //data peminjaman terbaru
            'peminjamanTerbaru' => Peminjaman::with('buku', 'user')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
