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
     public function index()
    {
        return view('petugas.dashboard', [
            'totalBuku' => Buku::count(),
            'totalAnggota' => User::where('role', 'anggota')->count(),
            'totalPeminjaman' => Peminjaman::where('status', 'dipinjam')->count(),
            'totalTerlambat' => Peminjaman::where('status', 'dipinjam')
                ->where('jatuh_tempo', '<', Carbon::now())
                ->count(),

            'peminjamanTerbaru' => Peminjaman::with('buku', 'user')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
