@extends('anggota.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-xl font-semibold mb-4">Katalog Buku</h2>

    <div class="grid grid-cols-4 gap-6">

        @foreach($buku as $b)
        <div class="bg-white rounded-xl shadow p-4">

            {{-- COVER --}}
            @if($b->cover)
                <img src="{{ asset('storage/'.$b->cover) }}"
                     class="w-full h-40 object-cover rounded mb-3">
            @endif

            {{-- JUDUL --}}
            <h3 class="font-semibold text-sm">
                {{ $b->judul_buku }}
            </h3>

            <p class="text-xs text-gray-500">
                {{ $b->penulis }}
            </p>

            <p class="text-xs mt-1">
                Stok: <span class="font-semibold">{{ $b->stok }}</span>
            </p>

            {{-- BUTTON --}}
            <div class="mt-3 w-full flex flex-col gap-2">

                {{-- PINJAM --}}
                <button class="w-full bg-indigo-500 text-white py-2 rounded text-sm hover:bg-indigo-600">
                    Pinjam
                </button>

                {{-- DETAIL --}}
                <a href="{{ route('anggota.buku.view', $b->id) }}"
                class="w-full text-center bg-gray-500 text-white py-2 rounded text-sm hover:bg-gray-600">
                    Detail
                </a>

            </div>

        </div>
        @endforeach

    </div>

</div>
@endsection
