<?php

namespace App\Http\Controllers;
use App\Models\Pendidikan;
use App\Models\Aps;
use App\Models\Kesehatan;
use Illuminate\Http\Request;

class SosialController extends Controller {
    public function index() {
        $dataAmh = Pendidikan::where('tahun', 2025)
                            ->orderBy('angka_melek_huruf', 'desc')
                            ->get();

        $dataAps = Aps::orderBy('tahun', 'desc')->first();

        $formattedDataAps = [
            'SD/MI' => $dataAps ? number_format($dataAps->persentase_sd, 2) . '%' : 'N/A',
            'SMP/MTs' => $dataAps ? number_format($dataAps->persentase_smp, 2) . '%' : 'N/A',
            'SMA/MA/SMK' => $dataAps ? number_format($dataAps->persentase_sma, 2) . '%' : 'N/A',
        ];

        // 2. Ambil data kesehatan terbaru
        $dataKesehatanTerbaru = Kesehatan::orderBy('tahun', 'desc')->first();

        // 3. Format data untuk ditampilkan (atau gunakan data default jika kosong)
        if ($dataKesehatanTerbaru) {
            $dataFaskes = [
                'Rumah Sakit' => $dataKesehatanTerbaru->jumlah_rumah_sakit . ' Unit',
                'Puskesmas' => $dataKesehatanTerbaru->jumlah_puskesmas . ' Unit',
                'Puskesmas Pembantu' => $dataKesehatanTerbaru->jumlah_puskesmas_pembantu . ' Unit',
            ];
        } else {
            // Data default jika tabel masih kosong
            $dataFaskes = [
                'Rumah Sakit' => '0 Unit',
                'Puskesmas' => '0 Unit',
                'Puskesmas Pembantu' => '0 Unit',
            ];
        }

        $dataUhh = '74,55 Tahun';

        return view('sosial.index', [
            'dataAmh' => $dataAmh,
            'dataAps' => $formattedDataAps,
            'dataFaskes' => $dataFaskes,
            'dataUhh' => $dataUhh
        ]);
    }
}
