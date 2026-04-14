<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;

class BukuController extends Controller
{
    //menampilkan semua buku
    public function index(Request $request)
    {

        $buku = Buku::all();
        return view('kepala.buku.index', compact('buku'));
    }

    //form tambah buku
    public function create()
    {
        return view('kepala.buku.create');
    }

    //simpan buku baru
    public function store(Request $request)
    {
        //validasi input
        $validated = $request->validate([
            'kode_buku'    => 'required|unique:buku,kode_buku',
            'judul_buku'   => 'required',
            'penulis'      => 'required',
            'sinopsis'     => 'nullable',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'stok'   => 'required|integer|min:0',
            'cover'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        //simapan ke database
        Buku::create($validated);

        return redirect()->route('kepala.buku.index')->with('success', 'Data berhasil ditambahkan');
    }

    //form edit buku
    public function edit(Buku $buku)
    {
        return view('kepala.buku.edit', ["buku" => $buku]);
    }

    //update data buku
    public function update(Request $request, Buku $buku)
    {
        //validasi input
        $validated = $request->validate([
            'kode_buku'    => 'required|unique:buku,kode_buku,' . $buku->id,
            'judul_buku'   => 'required',
            'penulis'      => 'required',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'sinopsis'     => 'nullable',
            'stok'   => 'required|integer|min:0',
            'cover'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // hapus cover lama jika upload baru
        if ($request->hasFile('cover')) {
            if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
                Storage::disk('public')->delete($buku->cover);
            }
        }

        // update cover baru
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        //update data
        $buku->update($validated);

        return redirect()->route('kepala.buku.index')->with('success', 'Data berhasil diupdate');
    }

    //hapus buku
    public function destroy(Buku $buku)
    {

    //hapus cover jika ada
        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
        Storage::disk('public')->delete($buku->cover);
    }

        //hapus data buku
        $buku->delete($buku->id);

        return redirect()->route('kepala.buku.index')->with('success', 'Data berhasil dihapus');
    }
}
