<?php

use App\Models\Obat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dokter/jadwal-periksa', function () {
    return view('dokter.jadwal-periksa.index');
})->middleware(['auth', 'verified'])->name('jadwal-periksa');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:dokter'])->prefix('dokter')->group(function () {
        Route::get('/', function () {
            return view('dokter.dashboard');
        })->name('dokter.dashboard');

        Route::prefix('obat')->group(function () {
            Route::get('/', [ObatController::class, 'index'])->name('dokter.obat.index');
            Route::get('/create', [ObatController::class, 'create'])->name('dokter.obat.create');
            Route::post('/store', [ObatController::class, 'store'])->name('dokter.obat.store');

            Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
            Route::put('/update/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');

            Route::delete('destroy/{id}', [ObatController::class, 'destroy'])->name('dokter.obat.destroy');
        });

        // Jadwal Periksa
        Route::get('/jadwal-periksa', [JadwalPeriksaController::class, 'index'])->name('jadwal-periksa');
        Route::get('/jadwal-periksa/create', [JadwalPeriksaController::class, 'create'])->name('jadwal-periksa.create');
        Route::post('/jadwal-periksa', [JadwalPeriksaController::class, 'store'])->name('jadwal-periksa.store');
    });
});

require __DIR__.'/auth.php';
