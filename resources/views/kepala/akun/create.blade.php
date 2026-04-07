@extends('kepala.layouts.app')

@section('content')
<div class="p-5 flex justify-center min-h-screen">

    <div class="w-full max-w-3xl">
        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-2xl font-semibold text-gray-800 mb-6">
                Tambah Akun
            </h3>

            <form action="{{ route('kepala.akun.store') }}" method="POST">
                @csrf

                {{-- ROLE --}}
                <div class="mb-4">
                    <label class="block mb-1">Role</label>
                    <select name="role" id="role"
                        class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih role --</option>
                        <option value="anggota">Anggota</option>
                        <option value="petugas">Petugas</option>
                        <option value="kepala">Kepala Perpus</option>
                        @error('level')<div class="text-danger small">{{ $message }}</div>@enderror
                    </select>
                </div>

                {{-- NAMA --}}
                <div class="mb-4">
                    <label class="block mb-1">Nama</label>
                    <input type="text" name="name"
                        class="w-full border rounded px-3 py-2"
                        value="{{ old('name') }}">
                </div>

                {{-- EMAIL --}}
                <div class="mb-4">
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border rounded px-3 py-2"
                        value="{{ old('email') }}">
                </div>

                {{-- PASSWORD --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block mb-1">Password</label>
                        <input type="password" name="password"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block mb-1">Konfirmasi</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <hr class="my-6">

                {{-- ANGGOTA --}}
                <div id="fieldAnggota">
                    <h5 class="font-semibold mb-3">Data Anggota</h5>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="nis"
                            placeholder="NIS"
                            class="border rounded px-3 py-2"
                            value="{{ old('nis') }}">

                        <input type="text" name="kelas"
                            placeholder="Kelas"
                            class="border rounded px-3 py-2"
                            value="{{ old('kelas') }}">
                    </div>

                    <input type="text" name="alamat"
                        placeholder="Alamat"
                        class="w-full border rounded px-3 py-2 mb-4"
                        value="{{ old('alamat') }}">
                </div>

                {{-- PETUGAS --}}
                <div id="fieldPetugas">
                    <h5 class="font-semibold mb-3">Data Petugas</h5>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="nip_petugas"
                            placeholder="NIP"
                            class="border rounded px-3 py-2"
                            value="{{ old('nip_petugas') }}">

                        <input type="text" name="no_hp"
                            placeholder="No HP"
                            class="border rounded px-3 py-2"
                            value="{{ old('no_hp') }}">
                    </div>
                </div>

                {{-- KEPALA --}}
                <div id="fieldKepala">
                    <h5 class="font-semibold mb-3">Data Kepala</h5>

                    <input type="text" name="nip_kepala"
                        placeholder="NIP"
                        class="w-full border rounded px-3 py-2 mb-4"
                        value="{{ old('nip_kepala') }}">
                </div>

                {{-- BUTTON --}}
                <div class="flex gap-3 mt-6">
                    <button type="submit"
                        class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600">
                        Simpan
                    </button>

                    <a href="{{ route('kepala.akun.index') }}"
                       class="bg-gray-300 px-5 py-2 rounded hover:bg-gray-400">
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
    document.getElementById('role').addEventListener('change', function() {
        document.getElementById('fieldAnggota').style.display = this.value === 'anggota' ? 'block' : 'none';
        document.getElementById('fieldPetugas').style.display = this.value === 'petugas' ? 'block' : 'none';
        document.getElementById('fieldKepala').style.display  = this.value === 'kepala'  ? 'block' : 'none';
    });

    @if(old('role'))
        document.getElementById('role').value = '{{ old("role") }}';
        document.getElementById('role').dispatchEvent(new Event('change'));
    @endif
</script>
@endpush
