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


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Halaman Utama (Dashboard)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/ipm-per-kecamatan', [IpmController::class, 'index'])->name('ipm.detail');

Route::get('/kemiskinan-per-kecamatan', [KemiskinanController::class, 'index'])->name('kemiskinan.detail');

Route::get('/pengangguran-per-kecamatan', [PengangguranController::class, 'index'])->name('pengangguran.detail');

Route::get('/sosial-kesejahteraan', [SosialController::class, 'index'])->name('sosial.index');

Route::get('/ekonomi-keuangan', [EkonomiController::class, 'index'])->name('ekonomi.index');

Route::get('/infrastruktur-lingkungan', [InfrastrukturController::class, 'index'])->name('infrastruktur.index');

// Rute Detail per Indikator
Route::get('/penduduk-per-kecamatan', [PendudukController::class, 'index'])->name('penduduk.detail');
Route::get('/ekonomi-per-kecamatan', [EkonomiController::class, 'index'])->name('ekonomi.detail');


// Rute Autentikasi Bawaan Breeze (biarkan saja, tidak mengganggu)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';