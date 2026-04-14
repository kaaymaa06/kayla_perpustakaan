<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    //menampilkan profile petugs
    public function index()
    {
        $user = auth()->user();

        //ambil data petugas sesuai user login
        $petugas = Petugas::with('user')
            ->where('user_id', $user->id)
            ->first();

        //buat inisial nama
        $inisial = '';
        if ($petugas && $petugas->user) {
            $nama = explode(' ', $petugas->user->name);

            foreach ($nama as $n) {
                $inisial .= strtoupper(substr($n, 0, 1));
            }
        }

        return view('petugas.profile.index', compact('petugas', 'inisial'));
    }

    //form edit profile
    public function edit($id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);
        return view('petugas.profile.edit', compact('petugas'));
    }

    //update profile
    public function update(Request $request, $id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);

        //validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip_petugas' => 'required',
        ]);

        //update user
        $petugas->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        //update data petugs
        $petugas->update([
            'nip_petugas' => $request->nip_petugas,
        ]);

        return redirect()->route('petugas.profile.index')->with('success', 'Data berhasil diupdate');
    }

    //menampilkan data buku
    public function buku()
    {
        $buku = Buku::all();
        return view('petugas.buku.index', compact('buku'));
    }
}
