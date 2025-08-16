<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\IpmKecamatan;

class IpmController extends Controller {
    public function index() {
        $dataIpm = IpmKecamatan::where('tahun', 2025)
                            ->orderBy('skor_ipm', 'desc')
                            ->get();

        return view('detail.ipm', compact('dataIpm'));
    }
}