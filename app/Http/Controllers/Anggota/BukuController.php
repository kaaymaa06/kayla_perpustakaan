<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;

class BukuController extends Controller
{
    //menampilkan semua datab buku
     public function index()
    {
        //ambil semua data buku
        $buku = Buku::all();

        //kirim ke halama index
        return view('anggota.buku.index', compact('buku'));
    }

    //menampilkan detail buku
    public function view(Buku $buku)
    {
        $buku = \App\Models\Buku::findOrFail($buku->id);

    // cek apakah user sudah meminjam buku ini
    $sudahPinjam = \App\Models\Peminjaman::where('user_id', auth()->id())
        ->where('buku_id', $buku->id)
        ->whereIn('status', ['menunggu', 'dipinjam'])
        ->exists();

    // kirim ke view
    return view('anggota.buku.view', [
        'buku' => $buku,
        'sudahPinjam' => $sudahPinjam,
    ]);
}
    }


