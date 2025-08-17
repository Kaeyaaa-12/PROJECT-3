<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkonomiController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IpmController;
use App\Http\Controllers\KemiskinanController;
use App\Http\Controllers\PengangguranController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\DataPendudukController;
use App\Http\Controllers\Admin\DataEkonomiController;
use App\Http\Controllers\Admin\DataIPMController;
use App\Http\Controllers\Admin\DataKemiskinanController;
use App\Http\Controllers\Admin\DataPengangguranController;
use App\Http\Controllers\Admin\DataPendidikanController;
use App\Http\Controllers\Admin\DataKesehatanController;
use App\Http\Controllers\Admin\DataKondisiJalanController;
use App\Http\Controllers\Admin\DataAksesRumahTanggaController;
use App\Http\Controllers\Admin\DataLuasLahanProduksiPertanianController;
use App\Http\Controllers\Admin\DataApsController;
use App\Http\Controllers\Admin\DataPdrbSektorUsahaController;



// Rute Halaman Utama
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/ipm-per-kecamatan', [IpmController::class, 'index'])->name('ipm.detail');
Route::get('/kemiskinan-per-kecamatan', [KemiskinanController::class, 'index'])->name('kemiskinan.detail');
Route::get('/pengangguran-per-kecamatan', [PengangguranController::class, 'index'])->name('pengangguran.detail');
Route::get('/sosial-kesejahteraan', [SosialController::class, 'index'])->name('sosial.index');
Route::get('/ekonomi-keuangan', [EkonomiController::class, 'index'])->name('ekonomi.index');
Route::get('/infrastruktur-lingkungan', [InfrastrukturController::class, 'index'])->name('infrastruktur.index');

Route::get('/penduduk-per-kecamatan', [PendudukController::class, 'index'])->name('penduduk.detail');

Route::get('/ekonomi-per-kecamatan', [EkonomiController::class, 'perKecamatan'])->name('ekonomi.detail');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('forgot-password', [AdminController::class, 'showForgotPasswordForm'])->name('password.request');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // Rute Manajemen Data Statistik
        Route::resource('/data-penduduk', DataPendudukController::class)->names('data_penduduk');
        Route::resource('/data-ekonomi', DataEkonomiController::class)->names('data_ekonomi');
        Route::resource('/data-ipm', DataIPMController::class)->names('data_ipm');
        Route::resource('/data-kemiskinan', DataKemiskinanController::class)->names('data_kemiskinan');
        Route::resource('/data-pengangguran', DataPengangguranController::class)->names('data_pengangguran');

        // Rute Data Sosial & Kesejahteraan
        Route::resource('/data-pendidikan', DataPendidikanController::class)
            ->parameter('data-pendidikan', 'pendidikan') // Tambahkan baris ini
            ->names('data_pendidikan');
        Route::resource('/data-aps', DataApsController::class)
            ->parameter('data-aps', 'data_ap') // parameter disesuaikan dengan variabel di controller
            ->names('data_aps');
         Route::resource('/data-kesehatan', DataKesehatanController::class)
            ->parameter('data-kesehatan', 'data_kesehatan') // parameter disesuaikan
            ->names('data_kesehatan');

        // Rute Data Ekonomi & Keuangan
        Route::resource('/data-pdrb-sektor-usaha', DataPdrbSektorUsahaController::class)->names('data_pdrb_sektor_usaha');
        Route::resource('/data-laju-inflasi', \App\Http\Controllers\Admin\DataLajuInflasiController::class)
            ->parameter('data-laju-inflasi', 'data_laju_inflasi') // parameter disesuaikan
            ->names('data_laju_inflasi');

        // Rute Data Infrastruktur
         Route::resource('/data-kondisi-jalan', DataKondisiJalanController::class)
            ->parameter('data-kondisi-jalan', 'data_kondisi_jalan')
            ->names('data_kondisi_jalan');
        Route::resource('/data-akses-rumah-tangga', DataAksesRumahTanggaController::class)
            ->parameter('data-akses-rumah-tangga', 'data_akses_rumah_tangga')
            ->names('data_akses_rumah_tangga');
        Route::get('/data-luas-lahan-produksi-pertanian', [DataLuasLahanProduksiPertanianController::class, 'index'])->name('data_luas_lahan_produksi_pertanian');
    });
});


// Rute Autentikasi Bawaan Breeze (biarkan saja, tidak mengganggu)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';