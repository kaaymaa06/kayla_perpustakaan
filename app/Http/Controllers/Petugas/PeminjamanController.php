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
            'status' => 'ditolak',
            'keterangan' => 'Peminjaman ditolak oleh petugas'
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
            'jatuh_tempo' => Carbon::now()->addDays(7),
            'keterangan' => 'Peminjaman disetujui'
        ]);

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Peminjaman berhasil dikonfirmasi');
    }

    public function konfirmasiKembali(Request $request, $id)
    {
        $data = Peminjaman::findOrFail($id);

        $data->tanggal_kembali = now();
        $data->status = 'selesai';
        $data->keterangan = $request->keterangan;

        if ($request->kondisi == 'rusak') {
            $data->denda = 5000;
            $data->status_denda = 'belum';
        } elseif ($request->kondisi == 'hilang') {
            $data->denda = 100000;
            $data->status_denda = 'belum';
        }

        $data->save();

        return redirect()->route('petugas.pengembalian.index');
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

    public function formPengembalian($id)
    {
        $peminjaman = Peminjaman::with('buku', 'user')->findOrFail($id);

        return view('petugas.pengembalian.form', compact('peminjaman'));
    }


}
