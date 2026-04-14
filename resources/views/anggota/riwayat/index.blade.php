@extends('anggota.layouts.app')

@section('content')

{{-- container utama halaman --}}
<div class="p-6 min-h-screen">

    {{-- judul halaman --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Riwayat Peminjaman
    </h2>

    {{-- card tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <table class="w-full border-collapse">

            {{-- header tabel --}}
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Judul Buku</th>
                    <th class="px-4 py-3 text-left">Tanggal Pinjam</th>
                    <th class="px-4 py-3 text-left">Jatuh Tempo</th>
                    <th class="px-4 py-3 text-left">Tanggal Kembali</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Denda</th>
                    <th class="px-4 py-3 text-left">Status Denda</th>
                    <th class="px-4 py-3 text-left">Tanggal Bayar</th>
                    <th class="px-4 py-3 text-left">Keterangan</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                {{-- looping data riwayat --}}
                @forelse ($riwayat as $index => $item)
                <tr class="border-b hover:bg-gray-50 transition">

                    {{-- nomor urut --}}
                    <td class="px-4 py-3">
                        {{ $index + 1 }}
                    </td>

                    {{-- judul buku --}}
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $item->buku->judul_buku ?? '-' }}
                    </td>

                    {{-- tanggal pinjam --}}
                    <td class="px-4 py-3">
                        {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- jatuh tempo --}}
                    <td class="px-4 py-3">
                        {{ $item->jatuh_tempo ? \Carbon\Carbon::parse($item->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- tanggal kembali --}}
                    <td class="px-4 py-3">
                        {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- status peminjaman --}}
                    <td class="px-4 py-3">

                         @php
                            $jatuhTempo = \Carbon\Carbon::parse($item->jatuh_tempo);
                        @endphp

                        {{-- status selesai --}}
                        @if ($item->status == 'selesai')
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Selesai
                            </span>

                        {{-- status ditolak --}}
                        @elseif ($item->status == 'ditolak')
                            <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                Ditolak
                            </span>

                        {{-- status terlambat --}}
                        @elseif (\Carbon\Carbon::now()->gt($jatuhTempo) && $item->status != 'selesai')
                            <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full">
                                Terlambat
                            </span>

                        {{-- status dipinjam --}}
                        @else
                            <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                Dipinjam
                            </span>
                        @endif
                    </td>

                    {{-- denda --}}
                    <td class="px-4 py-3">
                        @if($item->denda > 0)
                            <span class="text-red-600 font-medium">
                                Rp {{ number_format($item->denda) }}
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    {{-- status denda --}}
                    <td class="px-4 py-3">
                        @if($item->denda > 0)
                            @if($item->status_denda == 'lunas')
                                <span class="text-green-600 font-semibold">Lunas</span>
                            @else
                                <span class="text-red-600 font-semibold">Belum Bayar</span>
                            @endif
                        @else
                            -
                        @endif
                    </td>

                    {{-- Ttanggal bayar --}}
                    <td class="px-4 py-3">
                        {{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- keterangan --}}
                    <td class="px-4 py-3 text-gray-600">
                        {{ $item->keterangan ?? '-' }}
                    </td>

                    {{-- tombol aksi detail --}}
                    <td class="px-4 py-3">
                        <a href="{{ route('anggota.peminjaman.detail', $item->id) }}"
                            class="bg-cyan-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                            Detail
                        </a>
                    </td>

                </tr>

                {{-- jika data kosong --}}
                @empty
                <tr>
                    <td colspan="11" class="text-center py-6 text-gray-500">
                        Belum ada riwayat peminjaman
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>
@endsection
