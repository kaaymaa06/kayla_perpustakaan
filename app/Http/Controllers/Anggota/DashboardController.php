<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();

    $dipinjam = Peminjaman::where('user_id', auth()->id())
        ->where('status', 'dipinjam')
        ->count();

    $totalDenda = Peminjaman::where('user_id', auth()->id())
    ->where('status_denda', 'belum bayar')
    ->sum('denda');

    return view('anggota.dashboard', compact(
        'totalBuku',
        'dipinjam',
        'totalDenda'
    ));
    }
}
