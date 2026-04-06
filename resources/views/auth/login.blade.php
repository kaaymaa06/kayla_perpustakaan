<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded"
            value="{{ old('email') }}" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-2 border rounded" required>

        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded">
            Login
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Belum punya akun?
        <a href="/register" class="text-green-500 hover:underline">Register</a>
    </p>
</div>

</body>
</html>
