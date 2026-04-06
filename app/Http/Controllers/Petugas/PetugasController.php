<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $petugas = Petugas::with('user')
            ->where('user_id', $user->id)
            ->first();

        $inisial = '';

        if ($petugas && $petugas->user) {
            $nama = explode(' ', $petugas->user->name);

            foreach ($nama as $n) {
                $inisial .= strtoupper(substr($n, 0, 1));
            }
        }

        return view('petugas.profile.index', compact('petugas', 'inisial'));
    }

    public function edit($id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);

        return view('petugas.profile.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::with('user')->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip_petugas' => 'required',
        ]);

        $petugas->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $petugas->update([
            'nip_petugas' => $request->nip_petugas,
        ]);

        return redirect()->route('petugas.profile.index')->with('success', 'Data berhasil diupdate');
    }

    public function buku()
    {
        $buku = Buku::all();
        return view('petugas.buku.index', compact('buku'));
    }
}
