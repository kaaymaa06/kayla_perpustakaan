@extends('kepala.layouts.app')

@section('content')

{{-- container utama halaman --}}
<div class="p-6 flex justify-center min-h-screen">

    <div class="w-full max-w-3xl">

        {{-- card form --}}
        <div class="bg-white rounded-2xl shadow-md p-8">

            {{-- header form --}}
            <div class="mb-6 text-center">
                <h3 class="text-2xl font-bold text-gray-800">
                    Tambah Akun
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan akun baru sesuai role pengguna
                </p>
            </div>

            {{-- form tambah akun --}}
            <form action="{{ route('kepala.akun.store') }}" method="POST">
                @csrf

                {{-- pilih role --}}
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-600">Role</label>
                    <select name="role" id="role"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="">-- Pilih role --</option>
                        <option value="anggota">Anggota</option>
                        <option value="petugas">Petugas</option>
                        <option value="kepala">Kepala Perpus</option>

                        {{-- eror role kalo ada --}}
                        @error('level')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </select>
                </div>

                {{-- input nama --}}
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-600">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        value="{{ old('name') }}">
                </div>

                {{-- input email --}}
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-600">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        value="{{ old('email') }}">
                </div>

                {{-- input password --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block mb-1 text-sm text-gray-600">Password</label>
                        <input type="password" name="password"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    {{-- konfirmasi password --}}
                    <div>
                        <label class="block mb-1 text-sm text-gray-600">Konfirmasi</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                </div>

                <hr class="my-6">

                {{-- form anggota --}}
                <div id="fieldAnggota" class="mb-6">
                    <h5 class="font-semibold mb-3 text-cyan-600">Data Anggota</h5>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="nis"
                            placeholder="NIS"
                            class="border rounded-lg px-3 py-2"
                            value="{{ old('nis') }}">

                        <input type="text" name="kelas"
                            placeholder="Kelas"
                            class="border rounded-lg px-3 py-2"
                            value="{{ old('kelas') }}">
                    </div>

                    <input type="text" name="alamat"
                        placeholder="Alamat"
                        class="w-full border rounded-lg px-3 py-2"
                        value="{{ old('alamat') }}">
                </div>

                {{-- form petugas --}}
                <div id="fieldPetugas" class="mb-6">
                    <h5 class="font-semibold mb-3 text-cyan-600">Data Petugas</h5>

                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="nip_petugas"
                            placeholder="NIP"
                            class="border rounded-lg px-3 py-2"
                            value="{{ old('nip_petugas') }}">

                        <input type="text" name="no_hp"
                            placeholder="No HP"
                            class="border rounded-lg px-3 py-2"
                            value="{{ old('no_hp') }}">
                    </div>
                </div>

                {{-- form kapala --}}
                <div id="fieldKepala" class="mb-6">
                    <h5 class="font-semibold mb-3 text-cyan-600">Data Kepala</h5>

                    <input type="text" name="nip_kepala"
                        placeholder="NIP"
                        class="w-full border rounded-lg px-3 py-2"
                        value="{{ old('nip_kepala') }}">
                </div>

                {{-- tombol simpan --}}
                <div class="flex gap-3 mt-6">
                    <button type="submit"
                        class="flex-1 bg-cyan-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                        Simpan
                    </button>

                    <a href="{{ route('kepala.akun.index') }}"
                       class="flex-1 text-center bg-gray-300 py-2 rounded-lg hover:bg-gray-400 transition">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    //menampilkan form sesuai role yang dipilih
    document.getElementById('role').addEventListener('change', function() {
        document.getElementById('fieldAnggota').style.display = this.value === 'anggota' ? 'block' : 'none';
        document.getElementById('fieldPetugas').style.display = this.value === 'petugas' ? 'block' : 'none';
        document.getElementById('fieldKepala').style.display  = this.value === 'kepala'  ? 'block' : 'none';
    });

    //set value lama jika form gagal validasi
    @if(old('role'))
        document.getElementById('role').value = '{{ old("role") }}';
        document.getElementById('role').dispatchEvent(new Event('change'));
    @endif
</script>
@endpush
