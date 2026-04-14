<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    //menampilkan dashboard anggota
    public function index()
    {
        //hitung total semua buku
        $totalBuku = Buku::count();

    //hitung jumlah buku yang sedang dipinjam user
    $dipinjam = Peminjaman::where('user_id', auth()->id())
        ->where('status', 'dipinjam')
        ->count();

    //hitung total denda yang belum dibayar
    $totalDenda = Peminjaman::where('user_id', auth()->id())
    ->where('status_denda', 'belum bayar')
    ->sum('denda');

    //kirim data ke dashboard
    return view('anggota.dashboard', compact(
        'totalBuku',
        'dipinjam',
        'totalDenda'
    ));
    }
}
