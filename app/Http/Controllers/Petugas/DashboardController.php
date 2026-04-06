<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengajuan;

class DashboardController extends Controller
{
    public function index()
{
    return view('petugas.dashboard', [
        // 'totalBuku' => Buku::count(),
        // 'totalAnggota' => User::where('role', 'anggota')->count(),
        // 'totalPeminjaman' => Peminjaman::count(),
        // 'totalPengajuan' => Pengajuan::count(),
    ]);
}
}
