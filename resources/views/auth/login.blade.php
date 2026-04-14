<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-600">

{{-- container card login --}}
<div class="bg-gray-100 p-10 rounded-2xl shadow-xl w-full max-w-md">

    {{-- judul login --}}
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">
        Selamat Datang
    </h1>

    {{-- sub judul --}}
    <p class="text-center text-gray-500 mb-6">
        Silakan login untuk melanjutkan
    </p>

    {{-- pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- pesan eror --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- eror validasi --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-lg text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- form login --}}
    <form method="POST" action="/login" class="space-y-4">
        @csrf

        {{-- input email --}}
        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        {{-- input password --}}
        <div>
            <label class="text-sm text-gray-600">Password</label>
            <input type="password" name="password"
                class="w-full mt-1 p-3 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        {{-- tombol login --}}
        <button class="w-full py-3 rounded-lg text-white font-semibold
            bg-gradient-to-r from-blue-500 to-cyan-600
            hover:opacity-90 transition">
            Login
        </button>
    </form>

    {{-- footer --}}
    <p class="text-center text-sm text-gray-500 mt-6">
        © 2026 Perpustakaan
    </p>

    {{-- link register --}}
    <p class="text-center text-sm mt-2">
        Belum punya akun?
        <a href="/register" class="text-blue-600 font-medium hover:underline">
            Register
        </a>
    </p>

</div>

</body>
</html>
