<?php

namespace App\Http\Controllers\KepalaPerpus;

use App\Models\KepalaPerpus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KepalaPerpusController extends Controller
{
    //menampilkan profike kepala perpus
    public function index()
    {
        //ambil data kepala + user
        $kepala = KepalaPerpus::with('user')->first();

        //buat inisial nama
        $inisial = '';
        if ($kepala && $kepala->user) {
            $nama = explode(' ', $kepala->user->name);

            foreach ($nama as $n) {
                $inisial .= strtoupper(substr($n, 0, 1));
            }
        }

        //kirim ke view
        return view('kepala.profile.index', compact('kepala', 'inisial'));
    }

    //form edit profile
    public function edit($id)
    {
        $kepala = KepalaPerpus::with('user')->findOrFail($id);

        return view('kepala.profile.edit', compact('kepala'));
    }

    //update data profle
    public function update(Request $request, $id)
    {
        $kepala = KepalaPerpus::with('user')->findOrFail($id);

        //validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nip_kepala' => 'required',
        ]);

        // update user
        $kepala->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // update data kepala
        $kepala->update([
            'nip_kepala' => $request->nip_kepala,
        ]);

        return redirect()->route('kepala.profile.index')->with('success', 'Data berhasil diupdate');
    }

}
