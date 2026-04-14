<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with('user', 'buku');

        // FILTER TANGGAL PINJAM
        if ($request->from && $request->to) {
            $query->whereBetween('tanggal_pinjam', [$request->from, $request->to]);
        }

        if ($request->from && !$request->to) {
            $query->whereDate('tanggal_pinjam', '>=', $request->from);
        }

        if (!$request->from && $request->to) {
            $query->whereDate('tanggal_pinjam', '<=', $request->to);
        }

        $laporan = $query->latest()->get();

        return view('kepala.laporan.index', compact('laporan'));
    }
}
