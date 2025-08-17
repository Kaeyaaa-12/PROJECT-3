<?php

namespace App\Http\Controllers;

use App\Models\EkonomiKecamatan;
use App\Models\IpmKecamatan; // Tambahkan ini
use App\Models\PendudukKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // --- MENGAMBIL DATA UNTUK KARTU INDIKATOR (KPI) ---

        // 1. Data Jumlah Penduduk
        $tahunPendudukTerbaru = PendudukKecamatan::max('tahun');
        $totalPenduduk = $tahunPendudukTerbaru ? PendudukKecamatan::where('tahun', $tahunPendudukTerbaru)->sum('jumlah_penduduk') : 0;

        // 2. Data Pertumbuhan Ekonomi
        $tahunEkonomiTerbaru = EkonomiKecamatan::max('tahun');
        $rataRataPertumbuhan = $tahunEkonomiTerbaru ? EkonomiKecamatan::where('tahun', $tahunEkonomiTerbaru)->avg('laju_pertumbuhan') : 0;

        // 3. Data Indeks Pembangunan Manusia (BARU)
        $tahunIpmTerbaru = IpmKecamatan::max('tahun');
        $rataRataIpm = $tahunIpmTerbaru ? IpmKecamatan::where('tahun', $tahunIpmTerbaru)->avg('skor_ipm') : 0;


        $kpiData = [
            'Jumlah Penduduk' => number_format($totalPenduduk / 1000, 1, ',', '.') . ' Ribu Jiwa',
            'Pertumbuhan Ekonomi' => number_format($rataRataPertumbuhan, 2, ',', '.') . ' %',
            'Indeks Pembangunan Manusia' => number_format($rataRataIpm, 2, ',', '.'), // Ganti dengan data dinamis
            'Tingkat Kemiskinan' => '6.65 %', // (Masih statis)
            'Tingkat Pengangguran' => '4.15 %', // (Masih statis)
        ];

        // --- MENGAMBIL DATA UNTUK GRAFIK ---
        $pendudukPerTahun = PendudukKecamatan::select(
                DB::raw('tahun as label'),
                DB::raw('SUM(jumlah_penduduk) / 1000 as value')
            )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        $dataPenduduk = [
            'labels' => $pendudukPerTahun->pluck('label'),
            'values' => $pendudukPerTahun->pluck('value')
        ];

        // Data IPM (BARU)
        $ipmPerTahun = IpmKecamatan::select(
                DB::raw('tahun as label'),
                DB::raw('AVG(skor_ipm) as value')
            )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();

        $dataIPM = [
            'labels' => $ipmPerTahun->pluck('label'),
            'values' => $ipmPerTahun->pluck('value')
        ];

        // Data dummy lainnya
        $dataInflasi = [ 'labels' => ['2021', '2022', '2023'], 'values' => [3.0, 6.2, 2.8] ];
        $dataMiskin = [ 'labels' => ['2021', '2022', '2023'], 'values' => [7.0, 6.7, 6.6] ];

        return view('home', compact('kpiData', 'dataPenduduk', 'dataIPM', 'dataInflasi', 'dataMiskin'));
    }
}
