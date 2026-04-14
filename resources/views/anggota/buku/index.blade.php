@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Katalog Buku
    </h2>

    {{-- grid daftar buku --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        {{-- loop data buku --}}
        @foreach($buku as $b)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-4 flex flex-col">

            {{-- cover buku --}}
            @if($b->cover)
                <div class="h-44 bg-gray-100 flex items-center justify-center rounded-lg mb-3">
                    <img src="{{ asset('storage/'.$b->cover) }}"
                         class="max-h-full object-contain transition duration-300 hover:scale-105">
                </div>
            @endif

            {{-- judul buku --}}
            <h3 class="font-semibold text-sm text-gray-800 line-clamp-2">
                {{ $b->judul_buku }}
            </h3>

            {{-- penulis --}}
            <p class="text-xs text-gray-500 mt-1">
                {{ $b->penulis }}
            </p>

            {{-- stok buku --}}
            <p class="text-xs mt-2">
                Stok:
                <span class="font-semibold
                    {{ $b->stok == 0 ? 'text-red-500' : 'text-green-600' }}">
                    {{ $b->stok }}
                </span>
            </p>

            {{-- tombol detail --}}
            <div class="mt-auto pt-3">

                <a href="{{ route('anggota.buku.view', $b->id) }}"
                   class="block text-center bg-gradient-to-r from-blue-500 to-cyan-600 text-white py-2 rounded-lg text-sm hover:bg-indigo-600 transition">
                    Lihat Detail
                </a>

            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
