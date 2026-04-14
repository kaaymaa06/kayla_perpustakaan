@extends('anggota.layouts.app')

@section('content')
<div class="p-6 min-h-screen flex justify-center">

    <div class="w-full max-w-2xl">

        {{-- CARD --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            {{-- HEADER --}}
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Detail Peminjaman
                </h2>

                {{-- STATUS --}}
                <span class="px-3 py-1 rounded-full
                    {{ $peminjaman->status == 'selesai' ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-700' }}">
                    {{ ucfirst($peminjaman->status) }}
                </span>
            </div>

            {{-- INFO GRID --}}
            <div class="grid grid-cols-2 gap-4 text-gray-700">

                <div>
                    <p class="text-gray-500">Judul Buku</p>
                    <p class="font-semibold">{{ $peminjaman->buku->judul_buku }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal Pinjam</p>
                    <p class="font-semibold">
                        {{ $peminjaman->tanggal_pinjam
                            ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y')
                            : '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Jatuh Tempo</p>
                    <p class="font-semibold">
                        {{ $peminjaman->jatuh_tempo
                            ? \Carbon\Carbon::parse($peminjaman->jatuh_tempo)->format('d-m-Y')
                            : '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal Kembali</p>
                    <p class="font-semibold">
                        {{ $peminjaman->tanggal_kembali
                            ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d-m-Y')
                            : '-' }}
                    </p>
                </div>

            </div>

            {{-- GARIS --}}
            <div class="my-6 border-t"></div>

            {{-- DENDA --}}
            <div class="space-y-3">

                <div class="flex justify-between">
                    <span class="text-gray-500">Denda</span>
                    <span class="font-bold text-red-600 text-lg">
                        Rp {{ number_format($peminjaman->denda ?? 0, 0, ',', '.') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Jenis Denda</span>
                    <span class="font-medium text-red-500">
                        {{ $peminjaman->jenis_denda ?? '-' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Status Denda</span>
                    <span class="px-3 py-1  rounded-full
                        {{ $peminjaman->status_denda == 'lunas'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($peminjaman->status_denda) }}
                    </span>
                </div>

            </div>

        </div>

        {{-- STRUK --}}
        @if($peminjaman->denda > 0)
        <div class="bg-white rounded-3xl shadow-lg p-6 mt-6">

            <h3 class="text-lg font-semibold mb-4 text-gray-800">
                Struk Pembayaran
            </h3>

            <div class="bg-gray-50 p-4 rounded-xl space-y-2">

                <div class="flex justify-between">
                    <span>No Transaksi</span>
                    <span class="font-medium">TRX-{{ $peminjaman->id }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Tanggal Bayar</span>
                    <span>
                        {{ $peminjaman->tanggal_bayar
                            ? \Carbon\Carbon::parse($peminjaman->tanggal_bayar)->format('d-m-Y')
                            : '-' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Metode</span>
                    <span>{{ $peminjaman->metode_pembayaran ?? '-' }}</span>
                </div>

                <div class="flex justify-between">
                    <span>Jenis Denda</span>
                    <span>{{ $peminjaman->jenis_denda ?? '-' }}</span>
                </div>

                <div class="border-t my-2"></div>

                <div class="flex justify-between text-base font-bold">
                    <span>Total</span>
                    <span class="text-red-600">
                        Rp {{ number_format($peminjaman->denda, 0, ',', '.') }}
                    </span>
                </div>

                <div class="text-right">
                    <span class=" px-2 py-1 rounded
                        {{ $peminjaman->status_denda == 'lunas'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($peminjaman->status_denda) }}
                    </span>
                </div>

            </div>

        </div>
        @endif

        {{-- BUTTON --}}
        <div class="mt-6">
            <a href="{{ route('anggota.riwayat.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
                Kembali
            </a>
        </div>

    </div>

</div>
@endsection
