<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KemiskinanKecamatan;

class KemiskinanController extends Controller {
    public function index() {
        $dataKemiskinan = KemiskinanKecamatan::where('tahun', 2025)
                            ->orderBy('persentase_kemiskinan', 'desc')
                            ->get();

        return view('detail.kemiskinan', compact('dataKemiskinan'));
    }
}