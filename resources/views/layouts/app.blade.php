<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            <header class="bg-white shadow-md">
                <div class="bg-blue-800 py-3">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
                        <img src="http://googleusercontent.com/file_content/0" class="h-12 mr-3" alt="Logo Tulungagung" />
                        <div>
                            <h1 class="text-white font-bold text-lg">BADAN PUSAT STATISTIK</h1>
                            <p class="text-white text-sm">KABUPATEN TULUNGAGUNG</p>
                        </div>
                    </div>
                </div>
                <div class="bg-blue-700">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                <div class="hidden space-x-8 sm:-my-px sm:flex">
                                    <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->is('/') ? 'border-blue-300' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-blue-300 focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                        Beranda
                                    </a>
                                    
                                    <a href="{{ route('sosial.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('sosial.index') ? 'border-blue-300' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-blue-300 focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                        Sosial & Kesejahteraan
                                    </a>

                                    <a href="{{ route('ekonomi.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('ekonomi.index') ? 'border-blue-300' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-blue-300 focus:outline-none focus:text-white transition duration-150 ease-in-out">
                                        Ekonomi & Keuangan
                                    </a>
                                    <a href="{{ route('infrastruktur.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('infrastruktur.index') ? 'border-blue-300' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-blue-300 focus:outline-none focus:text-white transition duration-150 ease-in-out">
    Infrastruktur
</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main>
                {{ $slot }}
            </main>

            <footer class="bg-gray-800 text-white mt-16">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <p class="text-base">BADAN PUSAT STATISTIK KABUPATEN TULUNGAGUNG</p>
                        <div class="mt-8 flex justify-center space-x-6">
                            <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                            <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                            <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                        </div>
                    </div>
                    <div class="mt-12 border-t border-gray-700 pt-8">
                        <p class="text-base text-gray-400 text-center">&copy; {{ date('Y') }} Hak Cipta Dilindungi. Selalu sebutkan sumber data saat mengutip.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>