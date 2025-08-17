<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .submenu {
            display: none;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
            max-height: 0;
        }

        .submenu.active {
            display: block;
            max-height: 500px;
            /* Adjust if your submenu is taller */
        }

        /* Styling for active link (both standalone and submenu) */
        a.active-link {
            background-color: #1e40af;
            /* biru tua */
            color: #ffffff;
            font-weight: 600;
        }

        /* Styling for active parent button */
        button.active-parent {
            background-color: #374151;
            /* bg-gray-700 */
        }

        /* Arrow rotation */
        .arrow-rotate {
            transform: rotate(180deg);
        }

        /* Perubahan untuk submenu link agar mentok kiri */
        .submenu a {
            padding-left: 3.5rem;
            /* 2.5rem default + 1rem (pl-4) */
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0 flex flex-col">
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/logobps.png') }}" alt="Logo BPS" class="h-10 w-auto mr-3">
                    <div>
                        <p class="text-xs font-semibold">BADAN PUSAT STATISTIK</p>
                        <p class="text-sm font-bold">KAB. TULUNGAGUNG</p>
                    </div>
                </div>
            </div>
            <nav class="mt-4 flex-1">
                <ul class="space-y-1 px-2">
                    {{-- Dashboard Link --}}
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-4 py-2 hover:bg-gray-700 rounded-md">
                            <i class="ri-dashboard-line mr-3 w-5 text-center flex-shrink-0"></i>
                            <span class="truncate">Dashboard</span>
                        </a>
                    </li>

                    {{-- Manajemen Data Statistik --}}
                    <li>
                        <button data-submenu="manajemen-data"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-database-2-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Manajemen Data Statistik</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0 transition-transform duration-300"></i>
                        </button>
                        {{-- Hapus pl-8 dari sini --}}
                        <ul id="manajemen-data" class="submenu mt-1 space-y-1">
                            {{-- Tambahkan class 'w-full', 'block', dan 'py-2' ke link di bawah --}}
                            <li><a href="{{ route('admin.data_penduduk.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Penduduk</a></li>
                            <li><a href="{{ route('admin.data_ekonomi.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Ekonomi</a></li>
                            <li><a href="{{ route('admin.data_ipm.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data IPM</a></li>
                            <li><a href="{{ route('admin.data_kemiskinan.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Kemiskinan</a></li>
                            <li><a href="{{ route('admin.data_pengangguran.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Pengangguran</a></li>
                        </ul>
                    </li>

                    {{-- Data Sosial & Kesejahteraan --}}
                    <li>
                        <button data-submenu="sosial-kesejahteraan"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-group-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Data Sosial & Kesejahteraan</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0 transition-transform duration-300"></i>
                        </button>
                        <ul id="sosial-kesejahteraan" class="submenu mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_pendidikan.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Pendidikan</a></li>
                            <li><a href="{{ route('admin.data_aps.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data APS</a></li>
                            <li><a href="{{ route('admin.data_kesehatan.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Kesehatan</a></li>
                        </ul>
                    </li>

                    {{-- Data Ekonomi & Keuangan --}}
                    <li>
                        <button data-submenu="ekonomi-keuangan"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-money-dollar-circle-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Data Ekonomi & Keuangan</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0 transition-transform duration-300"></i>
                        </button>
                        <ul id="ekonomi-keuangan" class="submenu mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_pdrb_sektor_usaha.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">PDRB per Sektor Usaha</a>
                            </li>
                            <li><a href="{{ route('admin.data_laju_inflasi.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Laju Inflasi Tahunan</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Data Infrastruktur --}}
                    <li>
                        <button data-submenu="infrastruktur"
                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-700 rounded-md text-left">
                            <span class="flex items-center truncate">
                                <i class="ri-building-4-line mr-3 w-5 text-center flex-shrink-0"></i>
                                <span class="truncate">Data Infrastruktur</span>
                            </span>
                            <i class="ri-arrow-down-s-line ml-2 flex-shrink-0 transition-transform duration-300"></i>
                        </button>
                        <ul id="infrastruktur" class="submenu mt-1 space-y-1">
                            <li><a href="{{ route('admin.data_kondisi_jalan.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Kondisi Jalan</a></li>
                            <li><a href="{{ route('admin.data_akses_rumah_tangga.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Akses Rumah Tangga</a>
                            </li>
                            <li><a href="{{ route('admin.data_luas_lahan_produksi_pertanian.index') }}"
                                    class="w-full block py-2 hover:text-gray-300 rounded-md">Data Luas Lahan &
                                    Produksi</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            {{-- Logout Button --}}
            <div class="mt-auto p-2">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-3 bg-red-600 hover:bg-red-700 flex items-center rounded-md">
                        <i class="ri-logout-box-r-line mr-3"></i>
                        Logout
                    </button>
                </form>
            </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;
            const sidebarLinks = document.querySelectorAll('aside nav a');
            const submenuButtons = document.querySelectorAll('aside nav button[data-submenu]');

            // Tandai link yang aktif
            sidebarLinks.forEach(link => {
                // Periksa apakah URL saat ini sama persis dengan href link
                if (link.href === currentUrl) {
                    link.classList.add('active-link');

                    // Jika link berada di dalam submenu, buka submenu parent-nya
                    const parentUl = link.closest('ul.submenu');
                    if (parentUl) {
                        parentUl.classList.add('active');
                        const parentButton = document.querySelector(
                            `button[data-submenu="${parentUl.id}"]`);
                        if (parentButton) {
                            parentButton.classList.add('active-parent');
                            parentButton.querySelector('.ri-arrow-down-s-line').classList.add(
                                'arrow-rotate');
                        }
                    }
                }
            });

            // Fungsi toggle untuk submenu
            submenuButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const submenuId = button.getAttribute('data-submenu');
                    const submenu = document.getElementById(submenuId);
                    const arrow = button.querySelector('.ri-arrow-down-s-line');

                    // Cek apakah submenu ini sedang aktif
                    const isActive = submenu.classList.contains('active');

                    if (!isActive) {
                        submenu.classList.add('active');
                        arrow.classList.add('arrow-rotate');
                    } else {
                        submenu.classList.remove('active');
                        arrow.classList.remove('arrow-rotate');
                    }
                });
            });
        });
    </script>
</body>

</html>
