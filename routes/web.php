<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->group(function () {
    // Jadwal Periksa
    Route::get('/jadwal-periksa', [JadwalPeriksaController::class, 'index'])->name('jadwal-periksa');
    Route::get('/jadwal-periksa/create', [JadwalPeriksaController::class, 'create'])->name('jadwal-periksa.create');
    Route::post('/jadwal-periksa', [JadwalPeriksaController::class, 'store'])->name('jadwal-periksa.store');
    Route::patch('/jadwal-periksa/{id}/toggle', [JadwalPeriksaController::class, 'toggleStatus'])->name('jadwal-periksa.toggle');
    Route::get('/jadwal-periksa/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('jadwal-periksa.edit');
    Route::put('/jadwal-periksa/{id}', [JadwalPeriksaController::class, 'update'])->name('jadwal-periksa.update');
    Route::delete('/jadwal-periksa/{id}', [JadwalPeriksaController::class, 'destroy'])->name('jadwal-periksa.destroy');
    // ...route lain...
    // Obat
    Route::resource('obat', ObatController::class, [
        'as' => 'dokter'
    ]);
});
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien/dashboard', [App\Http\Controllers\Pasien\DashboardController::class, 'index'])->name('pasien.dashboard');
    Route::get('/pasien/profil', [App\Http\Controllers\Pasien\ProfileController::class, 'index'])->name('pasien.profil');
    Route::get('/pasien/riwayat', [App\Http\Controllers\Pasien\RiwayatController::class, 'index'])->name('pasien.riwayat');
});

Route::get('/dashboard-dokter', [DokterDashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard-pasien', [PasienDashboardController::class, 'index'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
