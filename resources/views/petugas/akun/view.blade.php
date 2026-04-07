@extends('petugas.layouts.app')

@section('content')
<div class="p-5 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-2xl font-semibold text-gray-800 mb-6">
                Detail Akun
            </h3>

            <table class="w-full text-base">

                <tr class="border-b">
                    <th class="text-left py-2 w-40">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>

                <tr class="border-b">
                    <th class="text-left py-2">Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr class="border-b">
                    <th class="text-left py-2">Email</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr class="border-b">
                    <th class="text-left py-2">Role</th>
                    <td>{{ ucfirst($user->role) }}</td>
                </tr>

                {{-- ANGGOTA --}}
                @if($user->role == 'anggota' && $user->anggota)
                <tr class="border-b">
                    <th class="py-2">NIS</th>
                    <td>{{ $user->anggota->nis }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2">Kelas</th>
                    <td>{{ $user->anggota->kelas }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2">Alamat</th>
                    <td>{{ $user->anggota->alamat ?? '-' }}</td>
                </tr>
                @endif

                {{-- PETUGAS --}}
                @if($user->role == 'petugas' && $user->petugas)
                <tr class="border-b">
                    <th class="py-2">NIP</th>
                    <td>{{ $user->petugas->nip_petugas ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2">No HP</th>
                    <td>{{ $user->petugas->no_hp ?? '-' }}</td>
                </tr>
                @endif

                {{-- KEPALA --}}
                @if($user->role == 'kepala' && $user->kepala)
                <tr class="border-b">
                    <th class="py-2">NIP</th>
                    <td>{{ $user->kepala->nip_kepala ?? '-' }}</td>
                </tr>
                @endif

                <tr class="border-b">
                    <th class="py-2">Dibuat</th>
                    <td>{{ optional($user->created_at)->format('d-m-Y H:i') }}</td>
                </tr>

                <tr>
                    <th class="py-2">Diupdate</th>
                    <td>{{ optional($user->updated_at)->format('d-m-Y H:i') }}</td>
                </tr>

            </table>

            {{-- BUTTON --}}
            <div class="flex gap-3 mt-6">

                <a href="{{ route('petugas.akun.edit', $user->id) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Edit
                </a>

                <form action="{{ route('petugas.akun.destroy', $user->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Hapus akun ini?')"
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Hapus
                    </button>
                </form>

                <a href="{{ route('petugas.akun.index') }}"
                   class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                    Kembali
                </a>

            </div>
        </div>
    </div>

</div>
@endsection
