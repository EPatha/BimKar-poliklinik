<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\Pasien\DashboardController as PasienDashboardController;
use App\Http\Controllers\Dokter\PeriksaController;

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
    // Obat
    Route::resource('obat', ObatController::class, [
        'as' => 'dokter'
    ]);

    // Periksa (CRU)
    Route::get('/periksa', [PeriksaController::class, 'index'])->name('dokter.periksa.index');
    Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('dokter.periksa.create');
    Route::post('/periksa', [PeriksaController::class, 'store'])->name('dokter.periksa.store');
    Route::get('/periksa/{id}/edit', [PeriksaController::class, 'edit'])->name('dokter.periksa.edit');
    Route::put('/periksa/{id}', [PeriksaController::class, 'update'])->name('dokter.periksa.update');
});
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    // Untuk resource janji periksa pasien
    Route::resource('janji', \App\Http\Controllers\Pasien\JanjiPeriksaController::class);
    // atau jika hanya index:
    Route::get('janji', [\App\Http\Controllers\Pasien\JanjiPeriksaController::class, 'index'])->name('janji.index');
    // Route riwayat juga pastikan ada:
    Route::get('riwayat', [\App\Http\Controllers\Pasien\RiwayatController::class, 'index'])->name('riwayat');
});

Route::get('/dashboard-dokter', [DokterDashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard-pasien', [PasienDashboardController::class, 'index'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
