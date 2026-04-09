@extends('petugas.layouts.app')

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-semibold mb-6">Data Pengembalian</h2>

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3 text-left">User</th>
                <th class="p-3 text-left">Buku</th>
                <th class="p-3 text-left">Jatuh Tempo</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($peminjaman as $p)
            <tr class="border-b">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $p->user->name ?? '-' }}</td>
                <td class="p-3">{{ $p->buku->judul ?? '-' }}</td>
                <td class="p-3">
                    {{ $p->jatuh_tempo ? \Carbon\Carbon::parse($p->jatuh_tempo)->format('d-m-Y') : '-' }}
                </td>

                <td class="p-3 text-center">
                    <form action="{{ route('petugas.pengembalian.konfirmasi', $p->id) }}" method="POST">
                        @csrf
                        <button class="bg-blue-500 text-white px-3 py-1 rounded">
                            Konfirmasi
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
