@extends('kepala.layouts.app')

@section('content')

{{-- container utama halaman --}}
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-2xl">

        {{-- card detail akun --}}
        <div class="bg-white rounded-2xl shadow-md p-8">

            {{-- header halaman --}}
            <div class="mb-6 text-center">
                <h3 class="text-2xl font-bold text-gray-800">
                    Detail Akun
                </h3>
                <p class=" text-gray-500 mt-1">
                    Informasi lengkap data pengguna
                </p>
            </div>

            {{-- tabel detail user --}}
            <div class="overflow-hidden rounded-xl border">
                <table class="w-full ">

                    <tbody class="divide-y">

                        {{-- id user --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">ID</th>
                            <td class="text-gray-800">{{ $user->id }}</td>
                        </tr>

                        {{-- nama --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Nama</th>
                            <td class="text-gray-800">{{ $user->name }}</td>
                        </tr>

                        {{-- email --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Email</th>
                            <td class="text-gray-800">{{ $user->email }}</td>
                        </tr>

                        {{-- role --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500 font-medium">Role</th>
                            <td class="text-cyan-600 font-semibold">{{ ucfirst($user->role) }}</td>
                        </tr>

                        {{-- data sesuai role --}}

                        {{-- jika anggota --}}
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

                        {{-- jika petugas --}}
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

                        {{-- jika kepala --}}
                        @if($user->role == 'kepala' && $user->kepala)
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">NIP</th>
                            <td>{{ $user->kepala->nip_kepala ?? '-' }}</td>
                        </tr>
                        @endif

                        {{-- tanggal dibuat --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Dibuat</th>
                            <td>{{ optional($user->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>

                        {{-- tanggal update --}}
                        <tr class="grid grid-cols-[120px_1fr] px-4 py-2 items-center">
                            <th class="text-gray-500">Diupdate</th>
                            <td>{{ optional($user->updated_at)->format('d-m-Y H:i') }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- tombol aksi --}}
            <div class="flex gap-3 mt-8">

                {{-- tomvol edit --}}
                <a href="{{ route('kepala.akun.edit', $user->id) }}"
                   class="flex-1 text-center bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                    Edit
                </a>

                {{-- tombol hapus --}}
                <form action="{{ route('kepala.akun.destroy', $user->id) }}" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Hapus akun ini?')"
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                        Hapus
                    </button>
                </form>

                {{-- tombol kembali --}}
                <a href="{{ route('kepala.akun.index') }}"
                   class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                    Kembali
                </a>

            </div>

        </div>
    </div>

</div>
@endsection
