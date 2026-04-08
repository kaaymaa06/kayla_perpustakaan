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
            ->get();

        return view('anggota.peminjaman.index', compact('peminjaman'));
    }

    public function view($id)
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('anggota.peminjaman.view', compact('peminjaman'));
    }

    public function acc($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'status' => 'dipinjam',
            'tanggal_kembali' => now()->addDays(7)
        ]);

        return back()->with('success', 'Peminjaman disetujui');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);

        return back()->with('success', 'Data peminjaman berhasil dihapus');
    }
}
