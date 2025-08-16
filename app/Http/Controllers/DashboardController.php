<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // =======================================================
        // BAGIAN BARU YANG DITAMBAHKAN
        // Data untuk 5 Indikator Kunci (KPI) [cite: 5, 6, 7, 8, 9]
        $kpiData = [
            'Jumlah Penduduk' => '1.145,2 Ribu Jiwa',
            'Pertumbuhan Ekonomi' => '5.57 %',
            'Indeks Pembangunan Manusia' => '74.70',
            'Tingkat Kemiskinan' => '6.65 %',
            'Tingkat Pengangguran' => '4.15 %',
        ];
        // =======================================================

        // KODE LAMA YANG SUDAH ADA (JANGAN DIHAPUS)
        // Data untuk Grafik Jumlah Penduduk (dalam ribu jiwa)
        $dataPenduduk = [
            'labels' => ['2021', '2022', '2023'],
            'values' => [1128.0, 1134.7, 1145.2]
        ];

        // Data untuk Grafik Indeks Pembangunan Manusia (IPM)
        $dataIPM = [
            'labels' => ['2021', '2022', '2023'],
            'values' => [73.6, 74.1, 74.7]
        ];
        
        // Data untuk Grafik Laju Inflasi Tahunan (%)
        $dataInflasi = [
            'labels' => ['2021', '2022', '2023'],
            'values' => [3.0, 6.2, 2.8]
        ];
        
        // Data untuk Grafik Persentase Penduduk Miskin (%)
        $dataMiskin = [
            'labels' => ['2021', '2022', '2023'],
            'values' => [7.0, 6.7, 6.6]
        ];

        // Tambahkan $kpiData ke dalam return view
        return view('dashboard', compact('kpiData', 'dataPenduduk', 'dataIPM', 'dataInflasi', 'dataMiskin'));
    }
}