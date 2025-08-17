<?php

namespace App\Http\Controllers;

use App\Models\PendudukKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. MENGAMBIL DATA UNTUK KARTU INDIKATOR (KPI)
        // Logika ini mencari tahun paling baru di database, lalu menjumlahkan penduduk di tahun itu.
        $tahunTerbaru = PendudukKecamatan::max('tahun');
        $totalPenduduk = $tahunTerbaru ? PendudukKecamatan::where('tahun', $tahunTerbaru)->sum('jumlah_penduduk') : 0;

        $kpiData = [
            'Jumlah Penduduk' => number_format($totalPenduduk / 1000, 1, ',', '.') . ' Ribu Jiwa',
            'Pertumbuhan Ekonomi' => '5.57 %',
            'Indeks Pembangunan Manusia' => '74.70',
            'Tingkat Kemiskinan' => '6.65 %',
            'Tingkat Pengangguran' => '4.15 %',
        ];

        // 2. MENGAMBIL DATA UNTUK GRAFIK DARI SEMUA TAHUN
        // Query ini SENGaja TIDAK memiliki filter "where('tahun', ...)"
        // agar mengambil data dari SEMUA TAHUN yang ada.
        $pendudukPerTahun = PendudukKecamatan::select(
                DB::raw('tahun as label'),
                DB::raw('SUM(jumlah_penduduk) / 1000 as value')
            )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        // Mengolah data untuk format yang dibutuhkan oleh Chart.js
        $dataPenduduk = [
            'labels' => $pendudukPerTahun->pluck('label'),
            'values' => $pendudukPerTahun->pluck('value')
        ];

        // Data dummy untuk grafik lainnya (biarkan seperti semula)
        $dataIPM = [ 'labels' => ['2021', '2022', '2023'], 'values' => [73.6, 74.1, 74.7] ];
        $dataInflasi = [ 'labels' => ['2021', '2022', '2023'], 'values' => [3.0, 6.2, 2.8] ];
        $dataMiskin = [ 'labels' => ['2021', '2022', '2023'], 'values' => [7.0, 6.7, 6.6] ];

        // Mengirim semua data ke view
        return view('dashboard', compact('kpiData', 'dataPenduduk', 'dataIPM', 'dataInflasi', 'dataMiskin'));
    }
}
