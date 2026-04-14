<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    //menampilkan profile anggota
    public function index()
    {
        //ambil data anggota sesuai dengan user login
        $anggota = Anggota::with('user')
            ->where('user_id', auth()->id())
            ->first();

            //jika tidak ada data
        if (!$anggota) {
            return redirect()->back()->with('error', 'Data anggota tidak ditemukan');
        }

        //buat inisial nama
        $inisial = '';
        if ($anggota->user) {
            $nama = explode(' ', $anggota->user->name);

            foreach ($nama as $n) {
                $inisial .= strtoupper(substr($n, 0, 1));
            }
        }

        //kirim ke view
        return view('anggota.profile.index', compact('anggota', 'inisial'));
    }

    //menampilkan form edit
    public function edit($id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);

        return view('anggota.profile.edit', compact('anggota'));
    }

    //update data profile
    public function update(Request $request, $id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);

        //validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nis' => 'required',
        ]);

        //update user
        $anggota->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        //update anggota
        $anggota->update([
            'nis' => $request->nis,
        ]);

        //kembali ke profile
        return redirect()->route('anggota.profile.index')
            ->with('success', 'Data berhasil diupdate');
    }
}
