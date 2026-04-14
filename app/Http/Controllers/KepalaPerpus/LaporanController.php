<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //menampilkan laporan peminjamn
    public function index(Request $request)
    {
        //ambil data peminjaman + relasi user sama buku
        $query = Peminjaman::with('user', 'buku');

        //filter berdasarkkan tanggal pinjam
        if ($request->from && $request->to) {
            $query->whereBetween('tanggal_pinjam', [$request->from, $request->to]);
        }

        if ($request->from && !$request->to) {
            $query->whereDate('tanggal_pinjam', '>=', $request->from);
        }

        if (!$request->from && $request->to) {
            $query->whereDate('tanggal_pinjam', '<=', $request->to);
        }

        //ambil data terbaru
        $laporan = $query->latest()->get();

        //kirim ke view
        return view('kepala.laporan.index', compact('laporan'));
    }
}
