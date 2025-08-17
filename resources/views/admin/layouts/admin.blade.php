<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        /* Custom styles for toggling submenus */
        .submenu {
            display: none;
        }

        .submenu.active {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/logobps.png') }}" alt="Logo BPS" class="h-10 w-auto mr-3">
                    <div>
                        <p class="text-xs font-semibold">BADAN PUSAT STATISTIK</p>
                        <p class="text-sm font-bold">KAB. TULUNGAGUNG</p>
                    </div>
                </div>
            </div>
            <nav class="mt-4">
                <ul class="space-y-1 px-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-4 py-2 hover:bg-gray-700 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">
                            <i class="ri-dashboard-line mr-3 w-5 text-center flex-shrink-0"></i>
                            <span class="truncate">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <button onclick="toggleSubmenu('manajemen-data')"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-database-2-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Manajemen Data Statistik</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0"></i>
                        </button>
                        <ul id="manajemen-data" class="submenu pl-8 mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_penduduk.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Penduduk</a></li>
                            <li><a href="{{ route('admin.data_ekonomi.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Ekonomi</a></li>
                            <li>
                                <a href="{{ route('admin.data_ipm.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data IPM</a>
                            </li>
                            <li><a href="{{ route('admin.data_kemiskinan.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Kemiskinan</a></li>
                            <li><a href="{{ route('admin.data_pengangguran.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Pengangguran</a></li>
                        </ul>
                    </li>

                    <li>
                        <button onclick="toggleSubmenu('sosial-kesejahteraan')"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-group-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Data Sosial & Kesejahteraan</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0"></i>
                        </button>
                        <ul id="sosial-kesejahteraan" class="submenu pl-8 mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_pendidikan.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Pendidikan</a></li>
                            <li><a href="{{ route('admin.data_aps.index') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data APS</a></li>
                            <li><a href="{{ route('admin.data_kesehatan') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Kesehatan</a></li>
                        </ul>
                    </li>

                    <li>
                        <button onclick="toggleSubmenu('infrastruktur')"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-building-4-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Data Infrastruktur</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0"></i>
                        </button>
                        <ul id="infrastruktur" class="submenu pl-8 mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_kondisi_jalan') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Kondisi Jalan</a></li>
                            <li><a href="{{ route('admin.data_akses_rumah_tangga') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Akses Rumah Tangga</a>
                            </li>
                            <li><a href="{{ route('admin.data_luas_lahan_produksi_pertanian') }}"
                                    class="block px-4 py-1 hover:text-gray-300 rounded-md">Data Luas Lahan &
                                    Produksi</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="absolute bottom-0 w-64">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-3 bg-red-600 hover:bg-red-700 flex items-center">
                            <i class="ri-logout-box-r-line mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        function toggleSubmenu(id) {
            document.getElementById(id).classList.toggle('active');
        }
    </script>
</body>

</html>
