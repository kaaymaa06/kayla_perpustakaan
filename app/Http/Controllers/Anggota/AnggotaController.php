<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with('user')
            ->where('user_id', auth()->id())
            ->first();

        if (!$anggota) {
            return redirect()->back()->with('error', 'Data anggota tidak ditemukan');
        }

        $inisial = '';
        if ($anggota->user) {
            $nama = explode(' ', $anggota->user->name);

            foreach ($nama as $n) {
                $inisial .= strtoupper(substr($n, 0, 1));
            }
        }

        return view('anggota.profile.index', compact('anggota', 'inisial'));
    }

    public function edit($id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);

        return view('anggota.profile.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nis' => 'required',
        ]);

        $anggota->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $anggota->update([
            'nis' => $request->nis,
        ]);

        return redirect()->route('anggota.profile.index')
            ->with('success', 'Data berhasil diupdate');
    }
}
