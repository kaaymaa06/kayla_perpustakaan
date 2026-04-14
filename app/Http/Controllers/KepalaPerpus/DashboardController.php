<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //menampilkan dashboard kepala perpus
    public function index()
    {
        //total buku dan anggota
        $totalBuku = Buku::count();
        $totalAnggota = User::count();

        //total peminjaman aktip
        $totalPinjam = Peminjaman::where('status', 'dipinjam')->count();

        //data hari ini
        $pinjamHariIni = Peminjaman::whereDate('created_at', today())->count();
        $kembaliHariIni = Peminjaman::whereDate('tanggal_kembali', today())->count();

        //jumlah keterlambatan
        $terlambat = Peminjaman::where('status', 'dipinjam')
            ->where('jatuh_tempo', '<', now())
            ->count();

        //buku yang sering dipinjam
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

        // list peminjaman yang terlambat
        $terlambatList = Peminjaman::with('user','buku')
            ->where('status', 'dipinjam')
            ->where('jatuh_tempo', '<', now())
            ->take(5)
            ->get();

        //kirim ke view dahsboard
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
