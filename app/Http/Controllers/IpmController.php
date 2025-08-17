<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpmKecamatan;

class IpmController extends Controller {
    public function index() {
        // Ambil tahun terbaru dari data IPM
        $tahunTerbaru = IpmKecamatan::max('tahun');

        // Ambil data dari tahun terbaru tersebut
        $dataIpm = IpmKecamatan::where('tahun', $tahunTerbaru)
                            ->orderBy('skor_ipm', 'desc')
                            ->get();

        return view('detail.ipm', compact('dataIpm'));
    }
}
