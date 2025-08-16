<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login</title>

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
                Admin Login
            </h2>

            <div class="flex justify-center">
                <img src="{{ asset('assets/images/logobps.png') }}" alt="Logo BPS" class="h-20 w-auto">
            </div>

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6 !mt-6">
                @csrf

                <div>
                    <label for="email" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                        Username
                    </label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        required autofocus
                        class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 px-3 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />
                </div>

                <div x-data="{ show: false }" class="relative">
                    <label for="password" class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                        Password
                    </label>
                    <input id="password" name="password" :type="show ? 'text' : 'password'"
                        autocomplete="current-password" required
                        class="mt-1 block w-full bg-gray-800 bg-opacity-50 border border-gray-600 rounded-md py-2 pl-3 pr-10 text-white placeholder-gray-400 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" />

                    <div class="absolute inset-y-0 right-0 top-6 flex items-center pr-3">
                        <button type="button" @click="show = !show" class="text-gray-400 hover:text-gray-200">
                            <svg x-show="!show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639l4.443-7.447A1 1 0 017 4h10a1 1 0 01.521.146l4.443 7.447a1.012 1.012 0 010 .639l-4.443 7.447A1 1 0 0117 20H7a1 1 0 01-.521-.146L2.036 12.322z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg x-show="show" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243l-4.243-4.243" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="text-right -mt-2">
                    <a href="{{ route('admin.password.request') }}"
                        class="text-xs text-gray-400 hover:text-blue-400 transition">
                        Lupa Password?
                    </a>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 transition">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
