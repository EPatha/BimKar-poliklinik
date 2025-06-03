<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;

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
    // route pasien
});

require __DIR__.'/auth.php';
