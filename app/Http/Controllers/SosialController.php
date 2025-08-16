<?php
namespace App\Http\Controllers;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class SosialController extends Controller {
    public function index() {
        // Data Angka Melek Huruf (sudah ada)
        $dataAmh = Pendidikan::where('tahun', 2025)
                            ->orderBy('angka_melek_huruf', 'desc')
                            ->get();

        // Data Angka Partisipasi Sekolah (APS) (sudah ada)
        $dataAps = [
            'SD/MI' => '99.85%',
            'SMP/MTs' => '96.50%',
            'SMA/MA/SMK' => '85.70%',
        ];

        // Data Jumlah Fasilitas Kesehatan (sudah ada)
        $dataFaskes = [
            'Puskesmas' => '32 Unit',
            'Rumah Sakit' => '8 Unit',
            'Puskesmas Pembantu' => '75 Unit',
        ];

        // --- DATA BARU YANG DITAMBAHKAN ---
        // Data Usia Harapan Hidup (UHH)
        $dataUhh = '74,55 Tahun';
        // ------------------------------------

        return view('sosial.index', compact('dataAmh', 'dataAps', 'dataFaskes', 'dataUhh'));
    }
}