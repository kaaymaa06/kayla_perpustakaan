<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('anggota.riwayat.index', compact('riwayat'));
    }

    public function bayarDenda($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->denda_dibayar = true;
        $peminjaman->save();

        return back()->with('success', 'Denda berhasil dibayar');
    }
}
