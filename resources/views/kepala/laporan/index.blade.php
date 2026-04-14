@extends('kepala.layouts.app')

@section('content')
<div class="p-6 min-h-screen print-area">

    {{-- HEADER --}}
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        Laporan Peminjaman Buku
    </h2>


    <div class="hidden print:block text-center mb-4">
        <h1 class="text-xl font-bold">LAPORAN PEMINJAMAN BUKU</h1>
        <p class="text-sm">Dicetak pada: {{ now()->format('d-m-Y') }}</p>
        <hr class="mt-2 border-black">
    </div>

    {{-- ================= RINGKASAN ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Total Peminjaman</p>
            <p class="text-xl font-bold text-gray-800">
                {{ $laporan->count() }}
            </p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Total Denda</p>
            <p class="text-xl font-bold text-red-600">
                Rp {{ number_format($laporan->sum('denda'), 0, ',', '.') }}
            </p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-gray-500">Denda Belum Dibayar</p>
            <p class="text-xl font-bold text-yellow-600">
                Rp {{ number_format($laporan->where('status_denda','belum bayar')->sum('denda'), 0, ',', '.') }}
            </p>
        </div>

    </div>

    {{-- ================= FILTER ================= --}}
    <form method="GET" class="bg-white p-5 rounded-xl shadow mb-6 flex flex-wrap gap-4 items-end">

        <div>
            <label class= text-gray-600">Dari</label>
            <input type="date" name="from" value="{{ request('from') }}"
                class="border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class= text-gray-600">Sampai</label>
            <input type="date" name="to" value="{{ request('to') }}"
                class="border rounded-lg px-3 py-2">
        </div>

        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Filter
        </button>

        <a href="{{ route('kepala.laporan.index') }}"
            class="bg-gray-300 px-4 py-2 rounded-lg">
            Reset
        </a>

       <button type="button" onclick="window.print()"
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
            Print
        </button>

    </form>

    {{-- ================= TABLE ================= --}}
    <div class="bg-white rounded-2xl shadow overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Buku</th>
                    <th class="p-3">Pinjam</th>
                    <th class="p-3">Tempo</th>
                    <th class="p-3">Kembali</th>
                    <th class="p-3">Denda</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse ($laporan as $i => $p)
                <tr class="hover:bg-gray-50">

                    <td class="p-3">{{ $i + 1 }}</td>

                    <td class="p-3">{{ $p->user->name }}</td>

                    <td class="p-3">{{ $p->buku->judul_buku }}</td>

                    <td class="p-3">
                        {{ $p->tanggal_pinjam ? \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="p-3">
                        {{ $p->tanggal_kembali ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d-m-Y') : '-' }}
                    </td>

                    {{-- DENDA --}}
                    <td class="p-3 font-semibold text-red-600">
                        Rp {{ number_format($p->denda ?? 0, 0, ',', '.') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="p-3">
                        @if($p->status_denda == 'lunas')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                Lunas
                            </span>
                        @elseif($p->status_denda == 'belum bayar')
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                Belum Bayar
                            </span>
                        @else
                            -
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center p-6 text-gray-500">
                        Tidak ada data
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

<style>
@media print {

    body * {
        visibility: hidden;
    }

    .print-area, .print-area * {
        visibility: visible;
    }

    .print-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        padding: 20px;
    }

    form,
    button,
    nav,
    aside {
        display: none !important;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    table th, table td {
        border: 1px solid #000;
        padding: 6px;
    }

    table th {
        background: #eee !important;
    }
}
</style>

@endsection
