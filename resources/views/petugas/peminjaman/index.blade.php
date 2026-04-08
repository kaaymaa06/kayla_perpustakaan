@extends('petugas.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Data Peminjaman</h2>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3 text-left">Nama User</th>
                <th class="p-3 text-left">Judul Buku</th>
                <th class="p-3 text-left">Tanggal Pinjam</th>
                <th class="p-3 text-left">Jatuh Tempo</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($peminjaman as $p)
            <tr class="border-b">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $p->user->name }}</td>
                <td class="p-3">{{ $p->buku->judul_buku }}</td>
                <td class="p-3">{{ $p->tanggal_pinjam }}</td>
                <td class="p-3">{{ $p->tanggal_kembali ?? '-' }}</td>

                {{-- STATUS --}}
                <td class="p-3">
                    @if($p->status == 'menunggu')
                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Menunggu</span>
                    @elseif($p->status == 'dipinjam')
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Dipinjam</span>
                    @elseif($p->status == 'ditolak')
                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded">Ditolak</span>
                    @elseif($p->status == 'selesai')
                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Selesai</span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="p-3 text-center">
                    <div class="flex gap-2 justify-center items-center">
                        @if($p->status == 'menunggu')

                            <a href="{{ route('petugas.peminjaman.form', $p->id) }}"
                                class="bg-green-500 text-white px-3 py-1 rounded">
                                Terima
                            </a>

                            <a href="{{ route('petugas.peminjaman.tolak', $p->id) }}"
                                class="bg-red-500 text-white px-3 py-1 rounded">
                                Tolak
                            </a>

                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif

                        {{-- TAMBAHAN DELETE --}}
                        <form action="{{ route('petugas.peminjaman.destroy', $p->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin hapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="bg-gray-700 text-white px-3 py-1 rounded text-sm">
                                Hapus
                            </button>

                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection
