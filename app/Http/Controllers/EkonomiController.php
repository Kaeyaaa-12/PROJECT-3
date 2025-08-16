<?php
namespace App\Http\Controllers;
use App\Models\EkonomiKecamatan; // Pastikan ini ada
use Illuminate\Http\Request;

class EkonomiController extends Controller {

    // Method BARU untuk Halaman Utama Kategori Ekonomi
    public function index() {
        // Data untuk Grafik PDRB per Sektor
        $dataPdrbSektor = [
            'labels' => ['Pertanian', 'Industri', 'Perdagangan', 'Konstruksi', 'Jasa'],
            'values' => [28.5, 22.1, 18.7, 10.5, 20.2]
        ];

        // Data untuk Grafik Inflasi Tahunan
        $dataInflasi = [
            'labels' => ['2021', '2022', '2023'],
            'values' => [3.0, 6.2, 2.8]
        ];

        return view('ekonomi.index', compact('dataPdrbSektor', 'dataInflasi'));
    }

    // Method LAMA untuk detail per kecamatan (biarkan saja)
    public function perKecamatan() {
        $dataEkonomi = EkonomiKecamatan::where('tahun', 2025)
                            ->orderBy('laju_pertumbuhan', 'desc')
                            ->get();

        return view('detail.ekonomi', compact('dataEkonomi'));
    }
}