<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-blue-800">Sosial & Kesejahteraan</h2>
                <p class="text-lg text-gray-600 mt-2">Data kualitas hidup dan akses terhadap layanan publik di Kabupaten
                    Tulungagung.</p>
            </div>

            <div class="mb-16">
                <h3 class="text-3xl font-bold text-gray-800 mb-8 border-l-4 border-blue-600 pl-4">Pendidikan</h3>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8 mb-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Angka Melek Huruf per Kecamatan</h4>
                    <p class="text-gray-600 mb-6">Persentase penduduk usia 15 tahun ke atas yang dapat membaca dan
                        menulis (Proyeksi Tahun 2025).</p>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead class="bg-blue-800 text-white">
                                    <tr>
                                        <th class="py-2 px-3 uppercase font-semibold text-sm text-left">Kecamatan</th>
                                        <th class="py-2 px-3 uppercase font-semibold text-sm text-right">Persentase (%)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($dataAmh as $data)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-2 px-3">{{ $data->kecamatan }}</td>
                                            <td class="py-2 px-3 text-right font-medium">
                                                {{ number_format($data->angka_melek_huruf, 2, ',', '.') }} %</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <div style="height: 300px;">
                                <canvas id="amhChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Angka Partisipasi Sekolah (APS)</h4>
                    <p class="text-gray-600 mb-6">Persentase anak pada kelompok usia sekolah tertentu yang sedang
                        bersekolah.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                        @foreach ($dataAps as $tingkat => $persen)
                            <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                                <h5 class="text-lg font-bold text-blue-800">{{ $tingkat }}</h5>
                                <p class="text-3xl font-bold text-blue-900 mt-2">{{ $persen }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-3xl font-bold text-gray-800 mb-8 border-l-4 border-green-600 pl-4">Kesehatan</h3>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-2">Jumlah Fasilitas Kesehatan</h4>
                    <p class="text-gray-600 mb-6">Ketersediaan sarana kesehatan untuk melayani masyarakat.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                        @foreach ($dataFaskes as $jenis => $jumlah)
                            <div class="bg-green-50 border border-green-200 p-4 rounded-lg">
                                <h5 class="text-lg font-bold text-green-800">{{ $jenis }}</h5>
                                <p class="text-3xl font-bold text-green-900 mt-2">{{ $jumlah }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik untuk Angka Melek Huruf
        const amhData = @json($dataAmh);
        new Chart(document.getElementById('amhChart'), {
            type: 'bar',
            data: {
                labels: amhData.map(item => item.kecamatan),
                datasets: [{
                    label: 'Angka Melek Huruf (%)',
                    data: amhData.map(item => item.angka_melek_huruf),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true // <--- GANTI MENJADI INI
                    }
                }
            }
        });
    </script>
</x-app-layout>
