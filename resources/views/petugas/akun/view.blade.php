@extends('petugas.layouts.app')

@section('content')
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-2xl shadow-md p-8">

            {{-- HEADER --}}
            <div class="mb-6 text-center">
                <h3 class="text-2xl font-bold text-gray-800">
                    Detail Akun
                </h3>
                <p class=" text-gray-500 mt-1">
                    Informasi lengkap data pengguna
                </p>
            </div>

            {{-- TABLE --}}
            <div class="overflow-hidden rounded-xl border">
                <table class="w-full ">

                    <tbody class="divide-y">

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">ID</th>
                            <td class="text-gray-800">{{ $user->id }}</td>
                        </tr>

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Nama</th>
                            <td class="text-gray-800">{{ $user->name }}</td>
                        </tr>

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Email</th>
                            <td class="text-gray-800">{{ $user->email }}</td>
                        </tr>

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Role</th>
                            <td class="text-indigo-600 font-semibold">{{ ucfirst($user->role) }}</td>
                        </tr>

                        {{-- ANGGOTA --}}
                        @if($user->role == 'anggota' && $user->anggota)
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">NIS</th>
                            <td>{{ $user->anggota->nis }}</td>
                        </tr>
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Kelas</th>
                            <td>{{ $user->anggota->kelas }}</td>
                        </tr>
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Alamat</th>
                            <td>{{ $user->anggota->alamat ?? '-' }}</td>
                        </tr>
                        @endif

                        {{-- PETUGAS --}}
                        @if($user->role == 'petugas' && $user->petugas)
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">NIP</th>
                            <td>{{ $user->petugas->nip_petugas ?? '-' }}</td>
                        </tr>
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">No HP</th>
                            <td>{{ $user->petugas->no_hp ?? '-' }}</td>
                        </tr>
                        @endif

                        {{-- KEPALA --}}
                        @if($user->role == 'kepala' && $user->kepala)
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">NIP</th>
                            <td>{{ $user->kepala->nip_kepala ?? '-' }}</td>
                        </tr>
                        @endif

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Dibuat</th>
                            <td>{{ optional($user->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>

                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Diupdate</th>
                            <td>{{ optional($user->updated_at)->format('d-m-Y H:i') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3 mt-8">

                <a href="{{ route('petugas.akun.edit', $user->id) }}"
                   class="flex-1 text-center bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>

                <form action="{{ route('petugas.akun.destroy', $user->id) }}" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Hapus akun ini?')"
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>

                <a href="{{ route('petugas.akun.index') }}"
                   class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                    Kembali
                </a>

            </div>

        </div>
    </div>

</div>
@endsection
