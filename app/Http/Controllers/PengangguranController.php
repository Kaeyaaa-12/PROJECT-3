<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PengangguranKecamatan;

class PengangguranController extends Controller {
    public function index() {
        // Ambil tahun terbaru
        $tahunTerbaru = PengangguranKecamatan::max('tahun');

        // Ambil data dari tahun terbaru dan urutkan
        $dataPengangguran = PengangguranKecamatan::where('tahun', $tahunTerbaru)
                            ->orderBy('persentase_pengangguran', 'desc')
                            ->get();

        return view('detail.pengangguran', compact('dataPengangguran'));
    }
}
