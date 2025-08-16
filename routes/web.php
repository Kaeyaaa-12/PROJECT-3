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



// Rute Halaman Utama (Dashboard)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/ipm-per-kecamatan', [IpmController::class, 'index'])->name('ipm.detail');
Route::get('/kemiskinan-per-kecamatan', [KemiskinanController::class, 'index'])->name('kemiskinan.detail');
Route::get('/pengangguran-per-kecamatan', [PengangguranController::class, 'index'])->name('pengangguran.detail');
Route::get('/sosial-kesejahteraan', [SosialController::class, 'index'])->name('sosial.index');
Route::get('/ekonomi-keuangan', [EkonomiController::class, 'index'])->name('ekonomi.index');
Route::get('/infrastruktur-lingkungan', [InfrastrukturController::class, 'index'])->name('infrastruktur.index');

Route::get('/penduduk-per-kecamatan', [PendudukController::class, 'index'])->name('penduduk.detail');
Route::get('/ekonomi-per-kecamatan', [EkonomiController::class, 'index'])->name('ekonomi.detail');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('forgot-password', [AdminController::class, 'showForgotPasswordForm'])->name('password.request');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout'); // Tambahkan rute ini
    });
});


// Rute Autentikasi Bawaan Breeze (biarkan saja, tidak mengganggu)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
