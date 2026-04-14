@extends('anggota.layouts.app')

@section('content')
<div class="p-6 flex justify-center">

    {{-- container utama --}}
    <div class="bg-white w-full max-w-3xl rounded-xl shadow p-6">

        {{-- judul --}}
        <h2 class="text-2xl font-semibold mb-6">Detail Peminjaman</h2>

        {{-- tabel detail --}}
        <table class="w-full text-sm">

            {{-- kode buku --}}
            <tr class="border-b">
                <td class="py-2 font-semibold w-1/3">Kode Buku</td>
                <td>{{ $peminjaman->buku->kode_buku }}</td>
            </tr>

            {{-- judul buku --}}
            <tr class="border-b">
                <td class="py-2 font-semibold">Judul Buku</td>
                <td>{{ $peminjaman->buku->judul_buku }}</td>
            </tr>

            {{-- tanggal pinjam --}}
            <tr class="border-b">
                <td class="py-2 font-semibold">Tanggal Pinjam</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('Y-m-d') }}</td>
            </tr>

            {{-- jatuh tempo --}}
            <tr class="border-b">
                <td class="py-2 font-semibold">Jatuh Tempo</td>
                <td>
                    @if($peminjaman->status == 'menunggu')
                        Menunggu konfirmasi
                    @else
                        {{ \Carbon\Carbon::parse($peminjaman->jatuh_tempo)->format('Y-m-d') }}
                    @endif
                </td>
            </tr>

            {{-- status peminjaman --}}
            <tr class="border-b">
                <td class="py-2 font-semibold">Status</td>
                <td>{{ $peminjaman->status }}</td>
            </tr>
        </table>

        {{-- tombol kembali --}}
        <div class="mt-6">
            <a href="{{ route('anggota.peminjaman.index') }}"
                class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Kembali
            </a>
        </div>

    </div>

</div>
@endsection
