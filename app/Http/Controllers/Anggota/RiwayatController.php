<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class RiwayatController extends Controller
{
    //menampilkan riwayat peminjaman
    public function index()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['dipinjam', 'ditolak', 'selesai'])
            ->get();

        return view('anggota.riwayat.index', compact('riwayat'));
    }

    //proses bayar denda
    public function bayarDenda(Request $request, $id)
    {
        //ambil data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);

        //update status denda jadi lunas
        $peminjaman->update([
            'status_denda' => 'lunas',
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => now(),
            'keterangan' => 'Denda dibayar via ' . $request->metode_pembayaran
        ]);

        return back()->with('success', 'Denda berhasil dibayar');
    }

    //menampilkan detail riwayat
    public function detail($id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        return view('anggota.riwayat.detail', compact('peminjaman'));
    }
}
