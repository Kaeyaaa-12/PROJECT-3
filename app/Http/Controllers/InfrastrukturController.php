<?php

namespace App\Http\Controllers;

use App\Models\KondisiJalan; // Tambahkan ini
use Illuminate\Http\Request;

class InfrastrukturController extends Controller
{
    public function index()
    {
        // Mengambil data kondisi jalan terbaru dari database
        $kondisiJalanTerbaru = KondisiJalan::orderBy('tahun', 'desc')->first();

        if ($kondisiJalanTerbaru) {
            $dataKondisiJalan = [
                'labels' => ['Baik', 'Sedang', 'Rusak Ringan', 'Rusak Berat'],
                'values' => [
                    $kondisiJalanTerbaru->baik,
                    $kondisiJalanTerbaru->sedang,
                    $kondisiJalanTerbaru->rusak_ringan,
                    $kondisiJalanTerbaru->rusak_berat,
                ]
            ];
        } else {
            // Data default jika tabel masih kosong
            $dataKondisiJalan = [
                'labels' => ['Baik', 'Sedang', 'Rusak Ringan', 'Rusak Berat'],
                'values' => [0, 0, 0, 0]
            ];
        }

        // Data untuk Akses Rumah Tangga (sudah ada)
        $dataAksesRumahTangga = [
            'Akses Air Bersih Layak' => '92.50%',
            'Akses Sanitasi Layak' => '88.75%',
            'Rasio Elektrifikasi' => '99.98%'
        ];

        // Data Luas Lahan dan Produksi Pertanian (sudah ada)
        $dataPertanian = [
            ['komoditas' => 'Padi Sawah', 'luas_lahan_ha' => 35200, 'produksi_ton' => 210500],
            ['komoditas' => 'Jagung', 'luas_lahan_ha' => 18500, 'produksi_ton' => 95000],
            ['komoditas' => 'Tebu', 'luas_lahan_ha' => 8900, 'produksi_ton' => 650000],
            ['komoditas' => 'Kedelai', 'luas_lahan_ha' => 4500, 'produksi_ton' => 7000],
        ];

        return view('infrastruktur.index', compact('dataKondisiJalan', 'dataAksesRumahTangga', 'dataPertanian'));
    }
}