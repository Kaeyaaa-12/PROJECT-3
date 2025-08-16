<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lupa Password Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bebas-neue:400|figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('{{ asset('assets/images/bglogin.png') }}');
            background-size: cover;
            background-position: center;
            font-family: 'Figtree', sans-serif;
        }

        .font-bebas {
            font-family: 'Bebas Neue', sans-serif;
        }
    </style>
</head>

<body class="antialiased">

    <div class="min-h-screen flex flex-col items-center justify-center bg-black bg-opacity-50 p-4">

        <div
            class="w-full max-w-sm p-8 space-y-6 bg-black bg-opacity-40 border border-gray-700 rounded-xl shadow-2xl backdrop-blur-lg">

            <h2 class="font-bebas text-center text-3xl font-bold text-blue-500 uppercase tracking-wider">
                Lupa Password
            </h2>

            <div class="flex justify-center">
                <img src="{{ asset('assets/images/logobps.png') }}" alt="Logo BPS" class="h-20 w-auto">
            </div>

            <p class="text-center text-sm text-gray-300 !mt-2">
                Masukkan email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
            </p>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-400 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6 !mt-6">
                @csrf

                <div>
                    <label for="email" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                        Alamat Email
                    </label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        required autofocus
                        class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 px-3 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />
                    @error('email')
                        <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 transition">
                        Kirim Link Reset
                    </button>
                </div>

                <div class="text-center !mt-4">
                    <a href="{{ route('admin.login') }}" class="text-xs text-gray-400 hover:text-blue-400 transition">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
