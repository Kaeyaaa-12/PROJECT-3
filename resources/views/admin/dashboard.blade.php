@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Bagian Card Indikator --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md relative">
            <h3 class="text-gray-500 text-sm">Jumlah Penduduk</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $kpiData['jumlah_penduduk'] }}</p>
            <i class="ri-community-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md relative">
            <h3 class="text-gray-500 text-sm">Pertumbuhan Ekonomi</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $kpiData['pertumbuhan_ekonomi'] }}</p>
            <i class="ri-line-chart-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md relative">
            <h3 class="text-gray-500 text-sm">Tingkat Kemiskinan</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $kpiData['tingkat_kemiskinan'] }}</p>
            <i class="ri-bar-chart-grouped-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md relative">
            <h3 class="text-gray-500 text-sm">Tingkat Pengangguran</h3>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $kpiData['tingkat_pengangguran'] }}</p>
            <i class="ri-pie-chart-2-line text-4xl text-gray-300 absolute bottom-4 right-4"></i>
        </div>
    </div>

    {{-- Bagian Grafik --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Pertumbuhan Penduduk</h3>
            <canvas id="pendudukChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Perbandingan Sektor Ekonomi</h3>
            <canvas id="sektorEkonomiChart"></canvas>
        </div>
        {{-- Grafik Baru --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Tingkat Kemiskinan (%)</h3>
            <canvas id="kemiskinanChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-800 mb-4">Tingkat Pengangguran (%)</h3>
            <canvas id="pengangguranChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mengambil data dari controller
        const dataPenduduk = @json($dataPenduduk);
        const dataSektorEkonomi = @json($dataSektorEkonomi);
        const dataKemiskinan = @json($dataKemiskinan);
        const dataPengangguran = @json($dataPengangguran);

        // Grafik Pertumbuhan Penduduk (Line Chart)
        new Chart(document.getElementById('pendudukChart'), {
            type: 'line',
            data: {
                labels: dataPenduduk.labels,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: dataPenduduk.values,
                    borderColor: '#3B82F6',
                    tension: 0.1
                }]
            }
        });

        // Grafik Sektor Ekonomi (Bar Chart)
        new Chart(document.getElementById('sektorEkonomiChart'), {
            type: 'bar',
            data: {
                labels: dataSektorEkonomi.labels,
                datasets: [{
                    label: 'Kontribusi',
                    data: dataSektorEkonomi.values,
                    backgroundColor: ['#3B82F6', '#60A5FA', '#93C5FD', '#BFDBFE'],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Tingkat Kemiskinan (Line Chart)
        new Chart(document.getElementById('kemiskinanChart'), {
            type: 'line',
            data: {
                labels: dataKemiskinan.labels,
                datasets: [{
                    label: 'Tingkat Kemiskinan (%)',
                    data: dataKemiskinan.values,
                    borderColor: '#EF4444',
                    tension: 0.1
                }]
            }
        });

        // Grafik Tingkat Pengangguran (Line Chart)
        new Chart(document.getElementById('pengangguranChart'), {
            type: 'line',
            data: {
                labels: dataPengangguran.labels,
                datasets: [{
                    label: 'Tingkat Pengangguran (%)',
                    data: dataPengangguran.values,
                    borderColor: '#F97316',
                    tension: 0.1
                }]
            }
        });
    </script>
@endsection
