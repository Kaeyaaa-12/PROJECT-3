<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Tingkat Kemiskinan per Kecamatan</h2>
                <p class="text-gray-600 mb-6">Kabupaten Tulungagung - Proyeksi Tahun 2025</p>

                <div class="mt-4 text-gray-700 text-base leading-relaxed max-w-4xl">
                    <p>
                        Data persentase penduduk miskin adalah indikator yang digunakan untuk mengukur tingkat kesejahteraan masyarakat di suatu wilayah. Angka ini menunjukkan proporsi penduduk yang hidup di bawah Garis Kemiskinan.
                    </p>
                    <p class="mt-2">
                        Informasi ini sangat vital bagi pemerintah dalam merancang program pengentasan kemiskinan yang lebih tepat sasaran, sehingga dapat meningkatkan kualitas hidup dan mengurangi kesenjangan ekonomi antar wilayah.
                    </p>
                </div>

                <hr class="my-8">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-blue-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Kecamatan</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Persentase Penduduk Miskin (%)</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($dataKemiskinan as $data)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $data->kecamatan }}</td>
                                    <td class="py-3 px-4 text-right font-medium">{{ number_format($data->persentase_kemiskinan, 2, ',', '.') }} %</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                         <div style="height: 400px;">
                            <canvas id="kemiskinanKecamatanChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($dataKemiskinan);
        new Chart(document.getElementById('kemiskinanKecamatanChart'), {
            type: 'bar',
            data: {
                labels: chartData.map(item => item.kecamatan),
                datasets: [{
                    label: 'Persentase Penduduk Miskin (%)',
                    data: chartData.map(item => item.persentase_kemiskinan),
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Membuat bar menjadi horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.x !== null) {
                                    label += context.parsed.x + ' %';
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