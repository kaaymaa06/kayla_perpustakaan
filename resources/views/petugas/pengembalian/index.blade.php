@extends('petugas.layouts.app')

@section('content')
<div class="p-6 min-h-screen">

    {{-- judul halaman --}}
    <h2 class="text-xl font-semibold mb-6 text-gray-800">
        Data Pengembalian Buku
    </h2>

    {{-- container --}}
    <div class="bg-white rounded-2xl shadow-sm border">

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px]">

                {{-- header tabel --}}
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Judul Buku</th>
                        <th class="p-3 text-left">Tanggal Pinjam</th>
                        <th class="p-3 text-left">Jatuh Tempo</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($peminjaman as $index => $p)
                    <tr class="border-b hover:bg-gray-50 transition">

                        {{-- nomor urut --}}
                        <td class="p-3">{{ $index + 1 }}</td>

                        {{-- nama peminjam --}}
                        <td class="p-3 font-medium text-gray-800">
                            {{ $p->user->name ?? '-' }}
                        </td>

                        {{-- judul buku --}}
                        <td class="p-3 text-gray-600">
                            {{ $p->buku->judul_buku ?? '-' }}
                        </td>

                        {{-- tanggal pinjam --}}
                        <td class="p-3 text-gray-600">
                            {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                        </td>

                        {{-- jatuh tempo --}}
                        <td class="p-3 text-gray-600">
                            {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}

                            @if($p->jatuh_tempo && now()->gt($p->jatuh_tempo))
                                <div class="text-red-500 mt-1">
                                    Terlambat
                                </div>
                            @endif
                        </td>

                        {{-- status peminjaman --}}
                        <td class="p-3">
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                Dipinjam
                            </span>
                        </td>

                        {{-- aksi --}}
                        <td class="p-3 text-center">

                            {{-- tombol konfirmasi --}}
                            <a href="{{ route('petugas.pengembalian.form', $p->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded transition">
                                Konfirmasi
                            </a>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center p-6 text-gray-500">
                            Tidak ada data pengembalian
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection
