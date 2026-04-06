@extends('petugas.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
    <h2>Data Buku</h2>
    <a href="{{ route('petugas.buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Cover</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $b)
            <tr>
                <td>{{ $b->kode_buku }}</td>
                <td>{{ $b->judul_buku }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    @if($b->cover)
                        <img src="{{ asset('storage/'.$b->cover) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('petugas.buku.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('petugas.buku.destroy', $b->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
