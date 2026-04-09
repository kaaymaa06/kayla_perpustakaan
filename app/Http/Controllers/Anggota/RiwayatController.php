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
            ->whereIn('status', ['dipinjam', 'ditolak', 'selesai'])
            ->get();

        return view('anggota.riwayat.index', compact('riwayat'));
    }

    public function bayarDenda(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status_denda' => 'lunas',
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => now(),
            'keterangan' => 'Denda dibayar via ' . $request->metode_pembayaran
        ]);

        return back()->with('success', 'Denda berhasil dibayar');
    }
}
