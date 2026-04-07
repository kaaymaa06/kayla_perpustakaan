<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
     public function index()
    {
        $buku = Buku::all();

        return view('anggota.buku.index', compact('buku'));
    }

    public function view(Buku $buku)
    {
        return view('anggota.buku.view', compact('buku'));
    }
}
