<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PendudukKecamatan;

class PendudukController extends Controller {
    public function index() {
        // Ambil data dari database dimana tahunnya adalah 2025
        $dataPenduduk = PendudukKecamatan::where('tahun', 2025)
                            ->orderBy('jumlah_penduduk', 'desc')
                            ->get();

        // Kirim data ke view
        return view('detail.penduduk', compact('dataPenduduk'));
    }
}