<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Carbon\Carbon;

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

        // cek stok
        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        // kurangi stok
        $buku->decrement('stok');

        // update peminjaman (AUTO 7 HARI)
        $peminjaman->update([
            'status' => 'dipinjam',
            'tanggal_pinjam' => Carbon::now(),
            'jatuh_tempo' => Carbon::now()->addDays(7)
        ]);

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dikonfirmasi');
    }

    public function konfirmasiKembali($id)
    {
        $peminjaman = Peminjaman::with('buku')->findOrFail($id);

        $hariIni = Carbon::now();

        $denda = 0;
        $terlambat = false;

       if ($peminjaman->jatuh_tempo) {
            $jatuhTempo = Carbon::parse($peminjaman->jatuh_tempo);

            if ($hariIni->gt($jatuhTempo)) {
                $terlambat = true;
                $denda = $jatuhTempo->diffInDays($hariIni) * 1000;
            }
        }

        // tambah stok
        $peminjaman->buku->increment('stok');

        // update status
        $peminjaman->update([
            'status' => 'selesai',
            'tanggal_kembali' => $hariIni,
            'denda' => $denda,
            'terlambat' => $terlambat
        ]);

        return back()->with('success', 'Pengembalian berhasil dikonfirmasi');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function pengembalian()
    {
        $peminjaman = Peminjaman::with('buku', 'user')
            ->where('status', 'dipinjam')
            ->latest()
            ->get();

        return view('petugas.pengembalian.index', compact('peminjaman'));
    }


}
