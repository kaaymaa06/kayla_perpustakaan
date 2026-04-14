<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-600">

{{-- conrainer card register --}}
<div class="bg-gray-100 p-10 rounded-2xl shadow-xl w-full max-w-md">

    {{-- judul halaman --}}
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">
        Daftar Anggota
    </h1>

    {{-- sub judul --}}
    <p class="text-center text-gray-500 mb-6">
        Silakan isi data untuk membuat akun
    </p>

    {{-- eror validasi --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-lg text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- form register --}}
    <form method="POST" action="/register" class="space-y-4">
        @csrf

        {{-- input nama --}}
        <div>
            <label class="text-sm text-gray-600">Nama</label>
            <input type="text" name="name"
                value="{{ old('name') }}"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- input email --}}
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- inpus password --}}
        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input type="password" name="password"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- konfirmasi password --}}
        <div>
            <label class="text-sm text-gray-600">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- input nis --}}
        <div>
            <label class="text-sm text-gray-600">NIS</label>
            <input type="text" name="nis"
                value="{{ old('nis') }}"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- inut kelas --}}
        <div>
            <label class="text-sm text-gray-600">Kelas</label>
            <input type="text" name="kelas"
                value="{{ old('kelas') }}"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        {{-- tombol register --}}
        <button class="w-full py-3 rounded-lg text-white font-semibold
            bg-gradient-to-r from-blue-500 to-cyan-600
            hover:opacity-90 transition">
            Register
        </button>
    </form>

    {{-- link ke login --}}
    <p class="text-center text-sm mt-6">
        Sudah punya akun?
        <a href="/login" class="text-blue-600 font-medium hover:underline">
            Login
        </a>
    </p>

</div>

</body>
</html>
