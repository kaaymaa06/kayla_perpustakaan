@extends('anggota.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Anggota</h2>

    <div class="row">

        {{-- Total Buku --}}
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h5>Total Buku</h5>
                    {{-- <h3>{{ $totalBuku }}</h3> --}}
                </div>
            </div>
        </div>

        {{-- Buku Dipinjam --}}
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5>Buku Dipinjam</h5>
                    {{-- <h3>{{ $totalPinjam }}</h3> --}}
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
