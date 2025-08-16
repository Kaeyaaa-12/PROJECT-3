<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class InfrastrukturController extends Controller {
    public function index() {
        // Data untuk Grafik Kondisi Jalan (sudah ada)
        $dataKondisiJalan = [
            'labels' => ['Baik', 'Sedang', 'Rusak Ringan', 'Rusak Berat'],
            'values' => [65.5, 20.2, 10.3, 4.0]
        ];

        // Data untuk Akses Rumah Tangga (sudah ada)
        $dataAksesRumahTangga = [
            'Akses Air Bersih Layak' => '92.50%',
            'Akses Sanitasi Layak' => '88.75%',
            'Rasio Elektrifikasi' => '99.98%'
        ];

        // --- DATA BARU YANG DITAMBAHKAN ---
        // Data Luas Lahan dan Produksi Pertanian
        $dataPertanian = [
            ['komoditas' => 'Padi Sawah', 'luas_lahan_ha' => 35200, 'produksi_ton' => 210500],
            ['komoditas' => 'Jagung', 'luas_lahan_ha' => 18500, 'produksi_ton' => 95000],
            ['komoditas' => 'Tebu', 'luas_lahan_ha' => 8900, 'produksi_ton' => 650000],
            ['komoditas' => 'Kedelai', 'luas_lahan_ha' => 4500, 'produksi_ton' => 7000],
        ];
        // ------------------------------------
        
        return view('infrastruktur.index', compact('dataKondisiJalan', 'dataAksesRumahTangga', 'dataPertanian'));
    }
}