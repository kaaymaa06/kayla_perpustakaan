<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    //menampilkan data pengembalian
    public function index()
    {
        //ambil semua data peminjaman, user sama buku
        $peminjaman = Peminjaman::with(['user', 'buku'])->get();

        //kirim ke view
        return view('petugas.pengembalian.index', compact('peminjaman'));
    }
}
