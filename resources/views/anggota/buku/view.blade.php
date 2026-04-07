@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center">

    <div class="bg-white w-full max-w-3xl rounded-xl shadow p-6">

        <h2 class="text-2xl font-semibold mb-6">Detail Buku</h2>

        <div class="grid grid-cols-3 gap-6">

            {{-- COVER --}}
            <div>
                @if($buku->cover)
                    <img src="{{ asset('storage/'.$buku->cover) }}"
                         class="w-full rounded-lg shadow">
                @endif
            </div>

            {{-- DATA --}}
            <div class="col-span-2">

                <table class="w-full text-sm">
                    <tr class="border-b">
                        <td class="py-2 font-semibold w-1/3">Kode Buku</td>
                        <td>{{ $buku->kode_buku }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Judul Buku</td>
                        <td>{{ $buku->judul_buku }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Penulis</td>
                        <td>{{ $buku->penulis }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Tahun Terbit</td>
                        <td>{{ $buku->tahun_terbit }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 font-semibold">Stok</td>
                        <td>{{ $buku->stok }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 font-semibold align-top">Sinopsis</td>
                        <td class="py-2">{{ $buku->sinopsis }}</td>
                    </tr>
                </table>

                {{-- BUTTON --}}
                <div class="mt-6 flex gap-3">
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                        Pinjam
                    </button>

                    <a href="{{ route('anggota.buku.index') }}"
                       class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                        Kembali
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
