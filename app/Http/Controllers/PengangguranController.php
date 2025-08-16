<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PengangguranKecamatan;

class PengangguranController extends Controller {
    public function index() {
        $dataPengangguran = PengangguranKecamatan::where('tahun', 2025)
                            ->orderBy('persentase_pengangguran', 'desc')
                            ->get();

        return view('detail.pengangguran', compact('dataPengangguran'));
    }
}