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

    public function tolak(Request $request, $id)
    {
        $p = Peminjaman::findOrFail($id);

        $p->status = 'ditolak';
        $p->keterangan = $request->keterangan;

        $p->save();

        return redirect()->back()->with('success', 'Peminjaman ditolak');
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
            'jatuh_tempo' => Carbon::now()->addDays(7),
            'keterangan' => 'Peminjaman disetujui'
        ]);

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dikonfirmasi');
    }


    public function konfirmasiKembali(Request $request, $id)
    {
        $request->validate([
            'kondisi' => 'required'
        ]);

        $p = Peminjaman::findOrFail($id);
        $denda = 0;
        $jenis = [];

         // DENDA TERLAMBAT
        if ($p->jatuh_tempo && now()->gt($p->jatuh_tempo)) {
            $hari = now()->diffInDays($p->jatuh_tempo);
            $denda += $hari * 1000;
            $jenis[] = 'terlambat';
        }

        // DENDA KONDISI
        if ($request->kondisi == 'rusak') {
            $denda += 5000;
            $jenis[] = 'rusak';
        } elseif ($request->kondisi == 'hilang') {
            $denda += 50000;
            $jenis[] = 'hilang';
        }

        // KEMBALIKAN STOK JIKA NORMAL
        $buku = Buku::find($p->buku_id);

        if ($buku && $request->kondisi != 'hilang') {
            $buku->increment('stok');
        }

        // UPDATE DATA
        $p->update([
            'tanggal_kembali' => now(),
            'status' => 'selesai',
            'denda' => $denda,
            'jenis_denda' => implode(', ', $jenis),
            'status_denda' => $denda > 0 ? 'belum bayar' : 'lunas',
            'keterangan' => $request->keterangan
        ]);


        return redirect()->route('petugas.pengembalian.index')
            ->with('success', 'Pengembalian berhasil diproses');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function view($id)
    {
        $peminjaman = Peminjaman::with('user', 'buku')->findOrFail($id);
        return view('petugas.peminjaman.view', compact('peminjaman'));
    }

   public function pengembalian()
    {
        $peminjaman = Peminjaman::with('user','buku')
            ->where('status', 'dipinjam')
            ->get();

        return view('petugas.pengembalian.index', compact('peminjaman'));
    }

    public function formKembali($id)
    {
        $peminjaman = Peminjaman::with('buku', 'user')->findOrFail($id);

        return view('petugas.pengembalian.form', compact('peminjaman'));
    }

    public function bayarDenda($id)
    {
        $p = Peminjaman::findOrFail($id);

        $p->update([
            'status_denda' => 'lunas',
            'metode_pembayaran' => 'cash',
            'tanggal_bayar' => now(),
        ]);

        return back()->with('success', 'Denda berhasil dibayar');
    }


}
