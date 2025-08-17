<?php
namespace App\Http\Controllers;
use App\Models\EkonomiKecamatan;
use App\Models\PdrbSektorUsaha;
use App\Models\LajuInflasi;
use Illuminate\Http\Request;

class EkonomiController extends Controller {

    // Method BARU untuk Halaman Utama Kategori Ekonomi
    public function index() {
        // Mengambil data PDRB Sektor Usaha terbaru
        $pdrbTerbaru = PdrbSektorUsaha::orderBy('tahun', 'desc')->first();

        if ($pdrbTerbaru) {
            $dataPdrbSektor = [
                'labels' => ['Pertanian', 'Industri', 'Perdagangan', 'Konstruksi', 'Jasa'],
                'values' => [
                    $pdrbTerbaru->pertanian,
                    $pdrbTerbaru->industri,
                    $pdrbTerbaru->perdagangan,
                    $pdrbTerbaru->konstruksi,
                    $pdrbTerbaru->jasa,
                ]
            ];
        } else {
            // Data default jika tabel masih kosong
            $dataPdrbSektor = [
                'labels' => ['Pertanian', 'Industri', 'Perdagangan', 'Konstruksi', 'Jasa'],
                'values' => [0, 0, 0, 0, 0]
            ];
        }

        // Data untuk Grafik Inflasi Tahunan
        // Mengambil data inflasi dari database
        $inflasi = LajuInflasi::orderBy('tahun', 'asc')->get();

        // Memformat data untuk grafik
        $dataInflasi = [
            'labels' => $inflasi->pluck('tahun'),
            'values' => $inflasi->pluck('persentase')
        ];

        return view('ekonomi.index', compact('dataPdrbSektor', 'dataInflasi'));
    }

     // Ubah method perKecamatan menjadi seperti ini
    public function perKecamatan() {
        // Ambil tahun terbaru dari data ekonomi
        $tahunTerbaru = EkonomiKecamatan::max('tahun');

        // Ambil data ekonomi dari tahun terbaru
        $dataEkonomi = EkonomiKecamatan::where('tahun', $tahunTerbaru)
                            ->orderBy('laju_pertumbuhan', 'desc')
                            ->get();

        return view('detail.ekonomi', compact('dataEkonomi'));
    }
}