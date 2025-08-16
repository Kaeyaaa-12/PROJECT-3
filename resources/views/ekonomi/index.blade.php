<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-blue-800">Ekonomi & Keuangan</h2>
                <p class="text-lg text-gray-600 mt-2">Data kesehatan ekonomi daerah dan kesejahteraan masyarakat Tulungagung.</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">PDRB per Sektor Usaha</h3>
                <p class="text-gray-600 mb-1">Distribusi persentase Produk Domestik Regional Bruto atas dasar harga berlaku menurut sektor ekonomi.</p>
                
                <p class="mt-4 text-gray-700 max-w-4xl">
                    Grafik ini menggambarkan kontribusi masing-masing sektor ekonomi terhadap total PDRB Kabupaten Tulungagung. Sektor dengan porsi terbesar merupakan penopang utama perekonomian daerah. Analisis ini penting untuk mengidentifikasi potensi pertumbuhan dan merumuskan kebijakan yang mendukung sektor-sektor unggulan.
                </p>
                <hr class="my-6">
                
                <div style="height: 400px;">
                    <canvas id="pdrbChart"></canvas>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Laju Inflasi Tahunan</h3>
                <p class="text-gray-600 mb-1">Perkembangan tingkat inflasi tahunan (year-on-year) yang menggambarkan perubahan harga barang dan jasa.</p>
                
                <p class="mt-4 text-gray-700 max-w-4xl">
                    Grafik ini menunjukkan perkembangan laju inflasi dari tahun ke tahun. Inflasi yang terkendali merupakan indikator stabilitas ekonomi, berpengaruh langsung terhadap daya beli masyarakat, dan menjadi pertimbangan penting dalam perumusan kebijakan regional.
                </p>
                <hr class="my-6">

                <div style="height: 400px;">
                    <canvas id="inflasiChart"></canvas>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik PDRB per Sektor (Pie Chart)
        const pdrbData = @json($dataPdrbSektor);
        new Chart(document.getElementById('pdrbChart'), {
            type: 'pie',
            data: {
                labels: pdrbData.labels,
                datasets: [{
                    label: 'Kontribusi PDRB',
                    data: pdrbData.values,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Grafik Inflasi (Line Chart)
        const inflasiData = @json($dataInflasi);
        new Chart(document.getElementById('inflasiChart'), {
            type: 'line',
            data: {
                labels: inflasiData.labels,
                datasets: [{
                    label: 'Laju Inflasi (%)',
                    data: inflasiData.values,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>
</x-app-layout>