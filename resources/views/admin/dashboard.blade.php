@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-gray-500 text-sm">Jumlah Penduduk</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">1.205.600</p>
            <i class="ri-community-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-gray-500 text-sm">Pertumbuhan Ekonomi</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">4,5%</p>
            <i class="ri-line-chart-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-gray-500 text-sm">Tingkat Kemiskinan</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">12,3%</p>
            <i class="ri-bar-chart-grouped-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-gray-500 text-sm">Tingkat Pengangguran</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">6,8%</p>
            <i class="ri-pie-chart-2-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Pertumbuhan Penduduk</h3>
            <canvas id="pendudukChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Perbandingan Sektor Ekonomi</h3>
            <canvas id="sektorEkonomiChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Chart Pertumbuhan Penduduk
        const pendudukData = {
            labels: ['2018', '2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Jumlah Penduduk',
                data: [800000, 850000, 900000, 950000, 1000000, 1100000, 1200000],
                borderColor: '#3B82F6',
                tension: 0.1
            }]
        };
        new Chart(document.getElementById('pendudukChart'), {
            type: 'line',
            data: pendudukData,
        });

        // Data untuk Chart Sektor Ekonomi
        const sektorEkonomiData = {
            labels: ['Pertanian', 'Industri', 'Perdagangan', 'Jasa'],
            datasets: [{
                label: 'Kontribusi',
                data: [300, 250, 350, 270],
                backgroundColor: ['#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE'],
            }]
        };
        new Chart(document.getElementById('sektorEkonomiChart'), {
            type: 'bar',
            data: sektorEkonomiData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
