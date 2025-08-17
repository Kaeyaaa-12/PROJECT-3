<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PendudukKecamatan;

class PendudukController extends Controller {
    public function index() {
        // Cari tahun terbaru yang ada di database
        $tahunTerbaru = PendudukKecamatan::max('tahun');

        // Ambil data penduduk hanya dari tahun terbaru tersebut
        $dataPenduduk = PendudukKecamatan::where('tahun', $tahunTerbaru)
                            ->orderBy('jumlah_penduduk', 'desc')
                            ->get();

        // Kirim data ke view
        return view('detail.penduduk', compact('dataPenduduk'));
    }
}