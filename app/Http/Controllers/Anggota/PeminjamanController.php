<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    //proses pinjam buku
    public function pinjam($id)
    {
        //ambil data buku
        $buku = Buku::findOrFail($id);

        //cek apakah masih ada denda
        $cekDenda = Peminjaman::where('user_id', auth()->id())
            ->where('status_denda', 'belum bayar')
            ->exists();

        if ($cekDenda) {
            return back()->with('error', 'Masih ada denda yang belum dibayar!');
        }

        //cek stok buku
        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        // simpan data peminjaman
        Peminjaman::create([
            'user_id' => auth()->id(),
            'buku_id' => $id,
            'tanggal_pinjam' => now(),
            'status' => 'menunggu'
        ]);

        return redirect()->route('anggota.peminjaman.index')
            ->with('success', 'Berhasil mengajukan peminjaman');
    }


    // menampilkan peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->where('status', 'menunggu')
            ->get();

        return view('anggota.peminjaman.index', compact('peminjaman'));
    }

    //detail peminjaman
    public function view($id)
    {
        $peminjaman = Peminjaman::with('buku')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('anggota.peminjaman.view', compact('peminjaman'));
    }

    //hapus data peminjaman
    public function destroy($id)
    {
        $data = Peminjaman::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    //menampilkan riwayat peminjaman
    public function riwayat()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', auth()->id())
            ->whereIn('status', ['dipinjam', 'ditolak', 'selesai'])
            ->get();

        return view('anggota.riwayat.index', compact('riwayat'));
    }
   public function store(Request $request)
{
    $request->validate([
        'buku_id' => 'required',
    ]);

    \App\Models\Peminjaman::create([
        'user_id' => auth()->id(),
        'buku_id' => $request->buku_id,
        'tanggal_pinjam' => now(),
        'jatuh_tempo' => now()->addDays(7),
        'status' => 'menunggu',
    ]);

    return back()->with('success', 'Peminjaman berhasil');
}

}
