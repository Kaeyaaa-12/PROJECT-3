<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Indeks Pembangunan Manusia (IPM) per Kecamatan</h2>
                <p class="text-gray-600 mb-6">Kabupaten Tulungagung - Proyeksi Tahun 2025</p>

                <div class="mt-4 text-gray-700 text-base leading-relaxed max-w-4xl">
                    <p>
                        Indeks Pembangunan Manusia (IPM) merupakan indikator penting untuk mengukur keberhasilan dalam upaya membangun kualitas hidup manusia. IPM menjelaskan bagaimana penduduk dapat mengakses hasil pembangunan dalam memperoleh pendapatan, kesehatan, dan pendidikan.
                    </p>
                    <p class="mt-2">
                        Skor IPM yang lebih tinggi menunjukkan tingkat harapan hidup, pengetahuan (pendidikan), dan standar hidup layak yang lebih baik di suatu wilayah.
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
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Skor IPM</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($dataIpm as $data)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ $data->kecamatan }}</td>
                                    <td class="py-3 px-4 text-right font-medium">{{ number_format($data->skor_ipm, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                         <div style="height: 400px;">
                            <canvas id="ipmKecamatanChart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($dataIpm);
        new Chart(document.getElementById('ipmKecamatanChart'), {
            type: 'bar',
            data: {
                labels: chartData.map(item => item.kecamatan),
                datasets: [{
                    label: 'Skor IPM',
                    data: chartData.map(item => item.skor_ipm),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Membuat bar menjadi horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false }
                },
                scales: {
                    x: {
                        beginAtZero: false, // Skala tidak harus mulai dari 0 untuk IPM
                        min: 70 // Atur nilai minimum agar perbedaan lebih terlihat
                    }
                }
            }
        });
    </script>
</x-app-layout>