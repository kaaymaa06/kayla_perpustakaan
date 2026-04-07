@extends('kepala.layouts.app')

@section('content')
<div class="p-5 flex justify-center min-h-screen">

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow p-6 max-w-3xl">

        <h3 class="text-2xl font-semibold text-gray-800 mb-6">
            Edit Akun - {{ $user->name }}
        </h3>

        <form action="{{ route('kepala.akun.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf

            {{-- ROLE --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Role</label>
                <input type="text"
                    class="w-full border rounded px-3 py-2 bg-gray-100"
                    value="{{ ucfirst($user->role) }}" disabled>
                <p class="text-sm text-gray-500 mt-1">Role tidak bisa diubah</p>
            </div>

            {{-- NAMA --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Nama</label>
                <input type="text" name="name"
                    class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Email</label>
                <input type="email" name="email"
                    class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror"
                    value="{{ old('email', $user->email) }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <hr class="my-6">

            {{-- ANGGOTA --}}
            @if($user->role == 'anggota' && $user->anggota)
            <h5 class="text-lg font-semibold mb-3">Data Anggota</h5>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-gray-700">NIS</label>
                    <input type="text" name="nis"
                        class="w-full border rounded px-3 py-2 @error('nis') border-red-500 @enderror"
                        value="{{ old('nis', $user->anggota->nis) }}">
                    @error('nis')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 text-gray-700">Kelas</label>
                    <input type="text" name="kelas"
                        class="w-full border rounded px-3 py-2 @error('kelas') border-red-500 @enderror"
                        value="{{ old('kelas', $user->anggota->kelas) }}">
                    @error('kelas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Alamat</label>
                <input type="text" name="alamat"
                    class="w-full border rounded px-3 py-2"
                    value="{{ old('alamat', $user->anggota->alamat) }}">
            </div>
            @endif

            {{-- PETUGAS --}}
            @if($user->role == 'petugas' && $user->petugas)
            <h5 class="text-lg font-semibold mb-3">Data Petugas</h5>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-gray-700">NIP</label>
                    <input type="text" name="nip_petugas"
                        class="w-full border rounded px-3 py-2 @error('nip_petugas') border-red-500 @enderror"
                        value="{{ old('nip_petugas', $user->petugas->nip_petugas) }}">
                    @error('nip_petugas')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 text-gray-700">No HP</label>
                    <input type="text" name="no_hp"
                        class="w-full border rounded px-3 py-2"
                        value="{{ old('no_hp', $user->petugas->no_hp) }}">
                </div>
            </div>
            @endif

            {{-- KEPALA --}}
            @if($user->role == 'kepala' && $user->kepala)
            <h5 class="text-lg font-semibold mb-3">Data Kepala Perpus</h5>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">NIP</label>
                <input type="text" name="nip_kepala"
                    class="w-full border rounded px-3 py-2 @error('nip_kepala') border-red-500 @enderror"
                    value="{{ old('nip_kepala', $user->kepala->nip_kepala) }}">
                @error('nip_kepala')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            @endif

            {{-- BUTTON --}}
            <div class="flex gap-3 mt-6">
                <button type="submit"
                    class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 transition">
                    Update
                </button>

                <a href="{{ route('kepala.akun.index') }}"
                   class="bg-gray-300 text-black px-5 py-2 rounded hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>
@endsection
