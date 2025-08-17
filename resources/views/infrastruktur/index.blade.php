<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-blue-800">Infrastruktur & Lingkungan</h2>
                <p class="text-lg text-gray-600 mt-2">Data kondisi fisik, fasilitas dasar, dan lingkungan di Kabupaten
                    Tulungagung.</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Kondisi Jalan Kabupaten</h3>
                <p class="text-gray-600 mb-1">Persentase panjang jalan dalam berbagai kondisi berdasarkan status
                    kewenangan kabupaten.</p>
                <p class="mt-4 text-gray-700 max-w-4xl">
                    Kondisi infrastruktur jalan yang baik merupakan tulang punggung konektivitas antar wilayah dan
                    kelancaran distribusi barang dan jasa, yang secara langsung mendukung pertumbuhan ekonomi daerah.
                </p>
                <hr class="my-6">
                <div style="height: 400px;">
                    <canvas id="jalanChart"></canvas>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Akses Rumah Tangga Terhadap Fasilitas Dasar</h3>
                <p class="text-gray-600 mb-1">Persentase rumah tangga yang telah mendapatkan akses terhadap layanan
                    esensial.</p>
                <p class="mt-4 text-gray-700 max-w-4xl">
                    Akses terhadap air bersih, sanitasi layak, dan listrik adalah hak dasar yang mencerminkan tingkat
                    kesejahteraan dan kualitas kesehatan masyarakat di suatu daerah.
                </p>
                <hr class="my-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-center">
                    @foreach ($dataAksesRumahTangga as $jenis => $persen)
                        <div class="bg-indigo-50 border border-indigo-200 p-4 rounded-lg">
                            <h5 class="text-lg font-bold text-indigo-800">{{ $jenis }}</h5>
                            <p class="text-3xl font-bold text-indigo-900 mt-2">{{ $persen }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Luas Lahan dan Produksi Pertanian</h3>
                <p class="text-gray-600 mb-6">Data luas panen dan jumlah produksi untuk komoditas pertanian unggulan di
                    Kabupaten Tulungagung.</p>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border">
                        <thead class="bg-blue-800 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Komoditas</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Luas Lahan (Ha)</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Produksi (Ton)</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse($dataPertanian as $data)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 font-medium">{{ $data->komoditas }}</td>
                                    <td class="py-3 px-4 text-right">{{ number_format($data->luas_lahan, 2, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4 text-right">{{ number_format($data->produksi, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b">
                                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">
                                        Data pertanian belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // ... (script untuk jalanChart tetap sama) ...
        const jalanData = @json($dataKondisiJalan);
        new Chart(document.getElementById('jalanChart'), {
            type: 'doughnut',
            data: {
                labels: jalanData.labels,
                datasets: [{
                    label: 'Kondisi Jalan (%)',
                    data: jalanData.values,
                    backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)', 'rgba(255, 99, 132, 0.8)'
                    ],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed + ' %';
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
