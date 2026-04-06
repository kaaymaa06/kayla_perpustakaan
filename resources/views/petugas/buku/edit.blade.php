@extends('petugas.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Buku</h2>

    <form action="{{ route('petugas.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Kode Buku</label>
            <input type="text" name="kode_buku" value="{{ $buku->kode_buku }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Judul Buku</label>
            <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Penulis</label>
            <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" min="1990" max="2030" value="{{ $buku->tahun_terbit }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control">{{ $buku->sinopsis }}</textarea>
        </div>

        <div class="mb-2">
            <label>Cover Lama</label><br>
            @if($buku->cover)
                <img src="{{ asset('storage/'.$buku->cover) }}" width="80">
            @endif
        </div>

        <div class="mb-2">
            <label>Ganti Cover</label>
            <input type="file" name="cover" class="form-control">
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('petugas.buku.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
