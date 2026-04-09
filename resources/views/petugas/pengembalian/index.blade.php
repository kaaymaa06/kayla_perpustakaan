@extends('petugas.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Data Pengembalian Buku</h2>

    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
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
                <tr class="border-b">

                    <td class="p-3">{{ $index + 1 }}</td>

                    <td class="p-3">{{ $p->user->name ?? '-' }}</td>

                    <td class="p-3">{{ $p->buku->judul_buku ?? '-' }}</td>

                    <td class="p-3">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}

                        @if($p->jatuh_tempo && now()->gt($p->jatuh_tempo))
                            <div class="text-red-500 text-xs">
                                Terlambat
                            </div>
                        @endif
                    </td>

                    <td class="p-3">
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">
                            Dipinjam
                        </span>
                    </td>

                    {{-- AKSI --}}
                    <td class="p-3 text-center">

                        <a href="{{ route('petugas.pengembalian.form', $p->id) }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            Konfirmasi Pengembalian
                        </a>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-4">
                        Tidak ada data pengembalian
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>
@endsection
