<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('buku', 'user')->latest()->get();

        return view('petugas.peminjaman.index', compact('peminjaman'));
    }

    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak');
    }

    public function formKonfirmasi($id)
    {
        $peminjaman = Peminjaman::with('buku', 'user')->findOrFail($id);

        return view('petugas.peminjaman.konfirmasi', compact('peminjaman'));
    }

    public function prosesKonfirmasi(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::findOrFail($peminjaman->buku_id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        $buku->decrement('stok');

        $peminjaman->update([
            'status' => 'dipinjam',
            'tanggal_kembali' => $request->tanggal_kembali
        ]);

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Berhasil dikonfirmasi');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}

