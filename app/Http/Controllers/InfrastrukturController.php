<?php

namespace App\Http\Controllers;

use App\Models\KondisiJalan;
use App\Models\AksesRumahTangga;
use App\Models\LuasLahanProduksiPertanian;
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

        $aksesTerbaru = AksesRumahTangga::orderBy('tahun', 'desc')->first();

        if ($aksesTerbaru) {
            $dataAksesRumahTangga = [
                'Akses Air Bersih Layak' => number_format($aksesTerbaru->persentase_akses_air_bersih_layak, 2) . '%',
                'Akses Sanitasi Layak' => number_format($aksesTerbaru->akses_sanitasi_layak, 2) . '%',
                'Rasio Elektrifikasi' => number_format($aksesTerbaru->rasio_elektrifikasi, 2) . '%'
            ];
        } else {
            // Data default jika tabel kosong
            $dataAksesRumahTangga = [
                'Akses Air Bersih Layak' => '0.00%',
                'Akses Sanitasi Layak' => '0.00%',
                'Rasio Elektrifikasi' => '0.00%'
            ];
        }

        // Ambil data pertanian dari database
        $tahunTerbaru = LuasLahanProduksiPertanian::max('tahun');
        $dataPertanian = LuasLahanProduksiPertanian::where('tahun', $tahunTerbaru)->get();

        return view('infrastruktur.index', compact('dataKondisiJalan', 'dataAksesRumahTangga', 'dataPertanian'));
    }
}