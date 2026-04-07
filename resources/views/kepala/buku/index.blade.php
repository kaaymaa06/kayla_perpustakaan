@extends('kepala.layouts.app')

@section('content')
<div class="p-6  min-h-screen">

    {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data Buku</h2>

            <a href="{{ route('kepala.buku.create') }}"
               class="bg-blue-500 font-bold text-white px-4 py-2 rounded hover:bg-blue-600">
                + Tambah Buku
            </a>
        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-base">

                <thead class="bg-gray-50 border-b text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Kode</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Penulis</th>
                        <th class="px-4 py-3 text-left">Tahun</th>
                        <th class="px-4 py-3 text-left">Stok</th>
                        <th class="px-4 py-3 text-left">Cover</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($buku as $index => $b)
                    <tr class="border-b hover:bg-gray-50">

                         <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $b->kode_buku }}</td>
                        <td class="px-4 py-3 font-medium">{{ $b->judul_buku }}</td>
                        <td class="px-4 py-3">{{ $b->penulis }}</td>
                        <td class="px-4 py-3">{{ $b->tahun_terbit }}</td>
                        <td class="px-4 py-3">{{ $b->stok }}</td>

                        <td class="px-4 py-3">
                            @if($b->cover)
                                <img src="{{ asset('storage/'.$b->cover) }}"
                                     class="w-14 h-auto rounded border">
                            @else
                                <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 space-x-2">

                            <a href="{{ route('kepala.buku.edit', $b->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                                Edit
                            </a>

                            <form action="{{ route('kepala.buku.destroy', $b->id) }}"
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')"
                                    class="px-3 py-1  bg-red-400 text-white  rounded-lg hover:bg-red-500 transition">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

</div>
@endsection
