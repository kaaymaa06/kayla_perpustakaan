<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = User::count();

        // peminjaman aktif
        $totalPinjam = Peminjaman::where('status', 'dipinjam')->count();

        // hari ini
        $pinjamHariIni = Peminjaman::whereDate('created_at', today())->count();

        $kembaliHariIni = Peminjaman::whereDate('tanggal_kembali', today())->count();

        // terlambat
        $terlambat = Peminjaman::where('status', 'dipinjam')
            ->where('jatuh_tempo', '<', now())
            ->count();

        // buku populer
        $bukuPopuler = Peminjaman::select('buku_id')
            ->selectRaw('count(*) as total')
            ->groupBy('buku_id')
            ->with('buku')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'judul_buku' => $item->buku->judul_buku ?? '-',
                    'total' => $item->total
                ];
            });

        // list terlambat
        $terlambatList = Peminjaman::with('user','buku')
            ->where('status', 'dipinjam')
            ->where('jatuh_tempo', '<', now())
            ->take(5)
            ->get();

        return view('kepala.dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'totalPinjam',
            'pinjamHariIni',
            'kembaliHariIni',
            'terlambat',
            'bukuPopuler',
            'terlambatList'
        ));
    }
}
