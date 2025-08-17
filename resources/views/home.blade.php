<x-app-layout>
    <div class="bg-gray-600 text-white"
        style="background-image: url('https://source.unsplash.com/1600x900/?tulungagung,landscape'); background-size: cover; background-position: center;">
        <div class="bg-black bg-opacity-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
                <h2 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    Indikator Strategis Tulungagung
                </h2>
                <p class="mt-6 max-w-2xl mx-auto text-xl">
                    Visualisasi data makroekonomi utama dari tahun ke tahun.
                </p>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-12">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Indikator Kunci Pembangunan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-5">
                    @foreach ($kpiData as $title => $value)
                        @php
                            // Tentukan link berdasarkan judul KPI
                            $link = '#'; // Link default
                            if ($title === 'Jumlah Penduduk') {
                                $link = route('penduduk.detail');
                            }
                            if ($title === 'Pertumbuhan Ekonomi') {
                                $link = route('ekonomi.detail');
                            }
                            if ($title === 'Indeks Pembangunan Manusia') {
                                $link = route('ipm.detail');
                            }
                            if ($title === 'Tingkat Kemiskinan') {
                                $link = route('kemiskinan.detail');
                            }
                            if ($title === 'Tingkat Pengangguran') {
                                $link = route('pengangguran.detail');
                            }
                        @endphp
                        <a href="{{ $link }}"
                            class="block bg-white overflow-hidden shadow-sm sm:rounded-lg p-5 text-center transition-transform transform hover:-translate-y-1 hover:shadow-xl">
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ $title }}
                            </h3>
                            <p class="mt-2 text-3xl font-bold text-blue-800">{{ $value }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Jumlah Penduduk (Ribu Jiwa)</h3>
                    <div style="height: 300px;">
                        <canvas id="pendudukChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Indeks Pembangunan Manusia (IPM)</h3>
                    <div style="height: 300px;">
                        <canvas id="ipmChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Laju Inflasi Tahunan (%)</h3>
                    <div style="height: 300px;">
                        <canvas id="inflasiChart"></canvas>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Grafik Persentase Penduduk Miskin (%)</h3>
                    <div style="height: 300px;">
                        <canvas id="miskinChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">

                <div class="lg:col-span-3">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Tentang BPS Kabupaten Tulungagung
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        Badan Pusat Statistik (BPS) Kabupaten Tulungagung adalah lembaga vertikal BPS yang bertanggung
                        jawab langsung kepada Kepala BPS Provinsi Jawa Timur. Kami berkomitmen untuk menyediakan data
                        dan informasi statistik yang berkualitas, akurat, dan tepat waktu untuk mendukung perencanaan,
                        monitoring, dan evaluasi pembangunan di Kabupaten Tulungagung.
                    </p>
                </div>

                <div class="lg:col-span-2 bg-white p-6 shadow-lg rounded-lg">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Tugas & Lokasi</h3>
                    <div>
                        <strong class="text-gray-700">Tugas Utama:</strong>
                        <p class="text-gray-600 mb-4">Melaksanakan sensus dan survei statistik, mengolah data, serta
                            mempublikasikan hasil statistik untuk masyarakat umum, pemerintah, dan pemangku kepentingan
                            lainnya.</p>
                    </div>
                    <div>
                        <strong class="text-gray-700">Alamat Kantor:</strong>
                        <p class="text-gray-600 mb-4">Jl. Pahlawan No.18, Dusun Krajan, Kedungwaru, Kabupaten
                            Tulungagung, Jawa Timur 66224</p>
                    </div>

                    <div class="w-full h-64 rounded-md overflow-hidden border">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.469498266014!2d111.9085813153443!3d-8.0531604828114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e2680512853d%3A0x8613324675544883!2sBadan%20Pusat%2... (Ini hanya contoh, ganti dengan kode embed Google Maps yang benar)"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dataPenduduk = @json($dataPenduduk);
        const dataIPM = @json($dataIPM);
        const dataInflasi = @json($dataInflasi);
        const dataMiskin = @json($dataMiskin);

        // --- AWAL PERBAIKAN PADA GRAFIK PENDUDUK ---
        new Chart(document.getElementById('pendudukChart'), {
            type: 'bar',
            data: {
                labels: dataPenduduk.labels,
                datasets: [{
                    label: 'Jumlah Penduduk (Ribu)',
                    data: dataPenduduk.values,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        // Ubah nilai ini dari 'false' menjadi 'true'
                        beginAtZero: true
                    }
                }
            }
        });
        // --- AKHIR PERBAIKAN PADA GRAFIK PENDUDUK ---

        new Chart(document.getElementById('ipmChart'), {
            type: 'line',
            data: {
                labels: dataIPM.labels,
                datasets: [{
                    label: 'Skor IPM',
                    data: dataIPM.values,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        new Chart(document.getElementById('inflasiChart'), {
            type: 'line',
            data: {
                labels: dataInflasi.labels,
                datasets: [{
                    label: 'Inflasi (%)',
                    data: dataInflasi.values,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false,
                    tension: 0.2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
        new Chart(document.getElementById('miskinChart'), {
            type: 'bar',
            data: {
                labels: dataMiskin.labels,
                datasets: [{
                    label: 'Penduduk Miskin (%)',
                    data: dataMiskin.values,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</x-app-layout>
