<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function pinjam($id)
    {
        $buku = Buku::findOrFail($id);

        // cek stok
        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        // simpan data
        Peminjaman::create([
            'user_id' => auth()->id(),
            'buku_id' => $id,
            'tanggal_pinjam' => now(),
            'status' => 'menunggu'
        ]);

        return redirect()->route('anggota.peminjaman.index');
    }

    // TAMPIL DATA PEMINJAMAN ANGGOTA
    public function index()
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->where('status', 'menunggu')
            ->get();

        return view('anggota.peminjaman.index', compact('peminjaman'));
    }

    public function view($id)
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('anggota.peminjaman.view', compact('peminjaman'));
    }


    public function destroy($id)
    {
        $data = Peminjaman::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function riwayat()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['dipinjam', 'ditolak', 'selesai'])
            ->get();

        return view('anggota.riwayat.index', compact('riwayat'));
    }
}
