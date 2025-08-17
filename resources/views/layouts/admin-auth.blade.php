{{-- resources/views/layouts/admin-auth.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Judul halaman akan dinamis --}}
    <title>@yield('title')</title>

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

            {{-- Judul Form akan dinamis --}}
            <h2 class="font-bebas text-center text-3xl font-bold text-blue-500 uppercase tracking-wider">
                @yield('form-title')
            </h2>

            <div class="flex justify-center">
                <img src="{{ asset('assets/images/logobps.png') }}" alt="Logo BPS" class="h-20 w-auto">
            </div>

            {{-- Konten utama dari setiap halaman akan dimasukkan di sini --}}
            @yield('content')

        </div>
    </div>
</body>

</html>
