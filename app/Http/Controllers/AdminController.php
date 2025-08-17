<?php

namespace App\Http\Controllers;

use App\Models\EkonomiKecamatan;
use App\Models\IpmKecamatan;
use App\Models\PendudukKecamatan;
use App\Models\KemiskinanKecamatan;
use App\Models\PengangguranKecamatan;
use App\Models\LajuInflasi;
use App\Models\PdrbSektorUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Memproses permintaan login admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function dashboard()
    {
        // --- MENGAMBIL DATA UNTUK KARTU INDIKATOR (KPI) ---

        // 1. Data Jumlah Penduduk
        $tahunPendudukTerbaru = PendudukKecamatan::max('tahun');
        $totalPenduduk = $tahunPendudukTerbaru ? PendudukKecamatan::where('tahun', $tahunPendudukTerbaru)->sum('jumlah_penduduk') : 0;

        // 2. Data Pertumbuhan Ekonomi
        $tahunEkonomiTerbaru = EkonomiKecamatan::max('tahun');
        $rataRataPertumbuhan = $tahunEkonomiTerbaru ? EkonomiKecamatan::where('tahun', $tahunEkonomiTerbaru)->avg('laju_pertumbuhan') : 0;

        // 3. Data Tingkat Kemiskinan
        $tahunKemiskinanTerbaru = KemiskinanKecamatan::max('tahun');
        $rataRataKemiskinan = $tahunKemiskinanTerbaru ? KemiskinanKecamatan::where('tahun', $tahunKemiskinanTerbaru)->avg('persentase_kemiskinan') : 0;

        // 4. Data Tingkat Pengangguran
        $tahunPengangguranTerbaru = PengangguranKecamatan::max('tahun');
        $rataRataPengangguran = $tahunPengangguranTerbaru ? PengangguranKecamatan::where('tahun', $tahunPengangguranTerbaru)->avg('persentase_pengangguran') : 0;

        $kpiData = [
            'jumlah_penduduk' => number_format($totalPenduduk),
            'pertumbuhan_ekonomi' => number_format($rataRataPertumbuhan, 1) . '%',
            'tingkat_kemiskinan' => number_format($rataRataKemiskinan, 1) . '%',
            'tingkat_pengangguran' => number_format($rataRataPengangguran, 1) . '%',
        ];

        // --- MENGAMBIL DATA UNTUK GRAFIK ---

        // Grafik Pertumbuhan Penduduk (LINE CHART)
        $pendudukPerTahun = PendudukKecamatan::select(
            DB::raw('tahun as label'),
            DB::raw('SUM(jumlah_penduduk) as value')
        )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();
        $dataPenduduk = [
            'labels' => $pendudukPerTahun->pluck('label'),
            'values' => $pendudukPerTahun->pluck('value')
        ];

        // Grafik PDRB Sektor Ekonomi (BAR CHART)
        $pdrbTerbaru = PdrbSektorUsaha::orderBy('tahun', 'desc')->first();
        if ($pdrbTerbaru) {
            $dataSektorEkonomi = [
                'labels' => ['Pertanian', 'Industri', 'Perdagangan', 'Jasa'],
                'values' => [
                    $pdrbTerbaru->pertanian,
                    $pdrbTerbaru->industri,
                    $pdrbTerbaru->perdagangan,
                    $pdrbTerbaru->jasa,
                ]
            ];
        } else {
            $dataSektorEkonomi = [
                'labels' => ['Pertanian', 'Industri', 'Perdagangan', 'Jasa'],
                'values' => [0, 0, 0, 0]
            ];
        }

        // Grafik Tingkat Kemiskinan (BARU - LINE CHART)
        $kemiskinanPerTahun = KemiskinanKecamatan::select(
            DB::raw('tahun as label'),
            DB::raw('AVG(persentase_kemiskinan) as value')
        )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();
        $dataKemiskinan = [
            'labels' => $kemiskinanPerTahun->pluck('label'),
            'values' => $kemiskinanPerTahun->pluck('value')
        ];

        // Grafik Tingkat Pengangguran (BARU - LINE CHART)
        $pengangguranPerTahun = PengangguranKecamatan::select(
            DB::raw('tahun as label'),
            DB::raw('AVG(persentase_pengangguran) as value')
        )
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->get();
        $dataPengangguran = [
            'labels' => $pengangguranPerTahun->pluck('label'),
            'values' => $pengangguranPerTahun->pluck('value')
        ];


        return view('admin.dashboard', compact('kpiData', 'dataPenduduk', 'dataSektorEkonomi', 'dataKemiskinan', 'dataPengangguran'));
    }

    /**
     * Log the admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function showForgotPasswordForm()
    {
        return view('admin.forgot-password');
    }
}
