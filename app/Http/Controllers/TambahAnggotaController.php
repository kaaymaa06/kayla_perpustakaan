<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anggota;
use App\Models\user;

class TambahAnggotaController extends Controller
{
    //index
    public function index()
    {
        $anggota = Anggota::with('user')->get();
        return view('tambah_anggota.index', compact('anggota'));
    }

    //create
    public function create()
    {
        $users = User::where('level', 'anggota')->get();
        return view('tambah_anggota.create', compact('users'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable'
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan');
    }

    //detail
    public function show($id)
    {
        $anggota = Anggota::with('user')->findOrFail($id);
        return view('tambah_anggota.view', compact('anggota'));
    }

    //edit
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $users = User::where('level', 'anggota')->get();

        return view('tambah_anggota.edit', compact('anggota', 'users'));
    }

    //update
     public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable'
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diupdate');
    }

    //detele
      public function destroy($id)
    {
        Anggota::destroy($id);

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus');
    }

}
