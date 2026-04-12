@extends('anggota.layouts.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Katalog Buku
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($buku as $b)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300 p-4 flex flex-col">

            {{-- COVER --}}
            @if($b->cover)
                <div class="h-44 bg-gray-100 flex items-center justify-center rounded-lg mb-3">
                    <img src="{{ asset('storage/'.$b->cover) }}"
                         class="max-h-full object-contain transition duration-300 hover:scale-105">
                </div>
            @endif

            {{-- JUDUL --}}
            <h3 class="font-semibold text-sm text-gray-800 line-clamp-2">
                {{ $b->judul_buku }}
            </h3>

            <p class="text-xs text-gray-500 mt-1">
                {{ $b->penulis }}
            </p>

            {{-- STOK --}}
            <p class="text-xs mt-2">
                Stok:
                <span class="font-semibold
                    {{ $b->stok == 0 ? 'text-red-500' : 'text-green-600' }}">
                    {{ $b->stok }}
                </span>
            </p>

            {{-- BUTTON --}}
            <div class="mt-auto pt-3">

                <a href="{{ route('anggota.buku.view', $b->id) }}"
                   class="block text-center bg-indigo-500 text-white py-2 rounded-lg text-sm hover:bg-indigo-600 transition">
                    Lihat Detail
                </a>

            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
