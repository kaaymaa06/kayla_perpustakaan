@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Buku</h2>

    <form action="{{ route('kepala.buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label>Kode Buku</label>
            <input type="text" name="kode_buku" class="form-control">
        </div>

        <div class="mb-2">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" class="form-control">
        </div>

        <div class="mb-2">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>

        <div class="mb-2">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control">
        </div>

        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="mb-2">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control"></textarea>
        </div>

        <div class="mb-2">
            <label>Cover</label>
            <input type="file" name="cover" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('kepala.buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
