<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

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
        //kirim data buku ke halaman detail
        return view('anggota.buku.view', compact('buku'));
    }
}
