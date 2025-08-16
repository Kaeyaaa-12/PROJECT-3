<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Jumlah Penduduk per Kecamatan</h2>
                <p class="text-gray-600 mb-6">Kabupaten Tulungagung - Proyeksi Tahun 2025</p>

                <div class="mt-4 text-gray-700 text-base leading-relaxed max-w-4xl">
                    <p>
                        Data ini menunjukkan proyeksi jumlah penduduk di setiap kecamatan di Kabupaten Tulungagung untuk tahun 2025. Angka ini merupakan indikator penting untuk perencanaan alokasi sumber daya, pembangunan infrastruktur, dan layanan publik di masa depan.
                    </p>
                    <p class="mt-2">
                        Kecamatan dengan jumlah penduduk tertinggi umumnya menunjukkan pusat populasi dan aktivitas ekonomi. Data sebaran penduduk ini dapat digunakan oleh pemerintah dan peneliti untuk menganalisis demografi wilayah secara lebih mendalam.
                    </p>
                </div>

                <hr class="my-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead class="bg-blue-800 text-white">
                                    <tr>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">No</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Kecamatan</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Jumlah Penduduk</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($dataPenduduk as $data)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                        <td class="py-3 px-4">{{ $data->kecamatan }}</td>
                                        <td class="py-3 px-4 text-right font-medium">{{ number_format($data->jumlah_penduduk, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div>
                         <div style="height: 400px;">
                            <canvas id="pendudukKecamatanChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($dataPenduduk);
        new Chart(document.getElementById('pendudukKecamatanChart'), {
            type: 'bar',
            data: {
                labels: chartData.map(item => item.kecamatan),
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: chartData.map(item => item.jumlah_penduduk),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Membuat bar menjadi horizontal agar nama kecamatan terbaca
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });
    </script>
</x-app-layout>