<?php
namespace App\Http\Controllers;
use App\Models\Pendidikan;
use App\Models\Aps;
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

        $dataFaskes = [
            'Puskesmas' => '32 Unit',
            'Rumah Sakit' => '8 Unit',
            'Puskesmas Pembantu' => '75 Unit',
        ];

        $dataUhh = '74,55 Tahun';

        return view('sosial.index', [
            'dataAmh' => $dataAmh,
            'dataAps' => $formattedDataAps,
            'dataFaskes' => $dataFaskes,
            'dataUhh' => $dataUhh
        ]);
    }
}
