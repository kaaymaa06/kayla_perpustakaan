@extends('kepala.layouts.app')

@section('content')

{{-- container utama halaman --}}
<div class="p-6 flex justify-center min-h-screen">

    {{-- card form edit --}}
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-4xl h-fit">

        {{-- header form  --}}
        <div class="mb-6 border-b pb-4">
            <h3 class="text-2xl font-bold text-gray-800">
                Edit Akun
            </h3>
            <p class=" text-gray-500">
                Update data pengguna: <span class="font-semibold">{{ $user->name }}</span>
            </p>
        </div>

        {{-- form update akun --}}
        <form action="{{ route('kepala.akun.update', $user->id) }}" method="POST">
            @method('PUT')
            @csrf

            {{-- role user tidak bisa diubah --}}
            <div class="mb-5">
                <label class="block font-medium text-gray-600 mb-1">Role</label>
                <input type="text"
                    class="w-full border rounded-lg px-3 py-2 bg-gray-100 text-gray-700"
                    value="{{ ucfirst($user->role) }}" disabled>
                <p class="text-xs text-gray-400 mt-1">Role tidak bisa diubah</p>
            </div>

            {{-- data user --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                {{-- nama --}}
                <div>
                    <label class="block  font-medium text-gray-600 mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- email --}}
                <div>
                    <label class="block  font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <hr class="my-6">

            {{-- form anggota --}}
            @if($user->role == 'anggota' && $user->anggota)
            <div class="mb-6">

                <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Anggota</h5>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-4">

                    {{-- nis --}}
                    <div>
                        <label class="block  text-gray-600 mb-1">NIS</label>
                        <input type="text" name="nis"
                            class="w-full border rounded-lg px-3 py-2 @error('nis') border-red-500 @enderror"
                            value="{{ old('nis', $user->anggota->nis) }}">
                        @error('nis')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- kelas --}}
                    <div>
                        <label class="block  text-gray-600 mb-1">Kelas</label>
                        <input type="text" name="kelas"
                            class="w-full border rounded-lg px-3 py-2 @error('kelas') border-red-500 @enderror"
                            value="{{ old('kelas', $user->anggota->kelas) }}">
                        @error('kelas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- alamat --}}
                <div>
                    <label class="block  text-gray-600 mb-1">Alamat</label>
                    <input type="text" name="alamat"
                        class="w-full border rounded-lg px-3 py-2"
                        value="{{ old('alamat', $user->anggota->alamat) }}">
                </div>
            </div>
            @endif

            {{-- form petugas --}}
            @if($user->role == 'petugas' && $user->petugas)
            <div class="mb-6">

                <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Petugas</h5>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- nip --}}
                    <div>
                        <label class="block  text-gray-600 mb-1">NIP</label>
                        <input type="text" name="nip_petugas"
                            class="w-full border rounded-lg px-3 py-2 @error('nip_petugas') border-red-500 @enderror"
                            value="{{ old('nip_petugas', $user->petugas->nip_petugas) }}">
                        @error('nip_petugas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- no hp --}}
                    <div>
                        <label class="block  text-gray-600 mb-1">No HP</label>
                        <input type="text" name="no_hp"
                            class="w-full border rounded-lg px-3 py-2"
                            value="{{ old('no_hp', $user->petugas->no_hp) }}">
                    </div>

                </div>
            </div>
            @endif

            {{-- form kepala --}}
            @if($user->role == 'kepala' && $user->kepala)
            <div class="mb-6">
                <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Kepala Perpus</h5>

                {{-- nip kepala --}}
                <div>
                    <label class="block  text-gray-600 mb-1">NIP</label>
                    <input type="text" name="nip_kepala"
                        class="w-full border rounded-lg px-3 py-2 @error('nip_kepala') border-red-500 @enderror"
                        value="{{ old('nip_kepala', $user->kepala->nip_kepala) }}">
                    @error('nip_kepala')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif

            {{-- tombol update sama batal --}}
            <div class="flex gap-3 mt-8">
                <button type="submit"
                    class="flex-1 bg-cyan-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>

                <a href="{{ route('kepala.akun.index') }}"
                   class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>
@endsection
