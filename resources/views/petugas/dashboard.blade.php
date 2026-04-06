@extends('petugas.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Petugas</h2>

    <div class="row">

        {{-- Total Buku --}}
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h5>Total Buku</h5>
                    {{-- <h3>{{ $totalBuku }}</h3> --}}
                </div>
            </div>
        </div>

        {{-- Total Anggota --}}
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5>Total Anggota</h5>
                    {{-- <h3>{{ $totalAnggota }}</h3> --}}
                </div>
            </div>
        </div>

        {{-- Peminjaman --}}
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body text-center">
                    <h5>Peminjaman</h5>
                    {{-- <h3>{{ $totalPeminjaman }}</h3> --}}
                </div>
            </div>
        </div>

        {{-- Pengajuan --}}
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body text-center">
                    <h5>Pengajuan</h5>
                    {{-- <h3>{{ $totalPengajuan }}</h3> --}}
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
