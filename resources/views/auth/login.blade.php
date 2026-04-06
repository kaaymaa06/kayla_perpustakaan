<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow w-96">

    <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

    @if(session('error'))
        <div class="bg-red-200 p-2 mb-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded">

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded">

        <button class="w-full bg-blue-500 text-white p-2 rounded">
            Login
        </button>
    </form>

</div>

</body>
</html>
