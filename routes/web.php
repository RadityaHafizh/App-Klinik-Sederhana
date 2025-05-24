<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect('/dashboard'));

Route::middleware(['auth'])->group(function () {
    Route::get('/home', fn() => view('home'))->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Hanya Pendaftaran yang bisa tambah/edit pasien
    Route::middleware('role:pendaftaran')->group(function () {
        Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
        Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
        Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    });

    // Hanya Perawat bisa input berat & tinggi badan
    Route::middleware('role:perawat')->group(function () {
        Route::get('/periksa/perawat/{id}', [PemeriksaanController::class, 'perawatForm'])->name('perawat.form');
        Route::post('/periksa/perawat/{id}', [PemeriksaanController::class, 'storePerawat'])->name('perawat.store');
    });

    // Hanya Dokter bisa input keluhan & diagnosa
    Route::middleware('role:dokter')->group(function () {
        Route::get('/diagnosa/dokter/{id}', [PemeriksaanController::class, 'dokterForm'])->name('dokter.form');
        Route::post('/diagnosa/dokter/{id}', [PemeriksaanController::class, 'storeDokter'])->name('dokter.store');

        // Form edit pemeriksaan dokter
        Route::get('/diagnosa/dokter/edit/{pemeriksaan}', [PemeriksaanController::class, 'edit'])->name('dokter.edit');
        Route::put('/diagnosa/dokter/edit/{pemeriksaan}', [PemeriksaanController::class, 'update'])->name('dokter.update');

        // Hapus pemeriksaan dokter
        Route::delete('/diagnosa/dokter/{pemeriksaan}', [PemeriksaanController::class, 'destroy'])->name('dokter.destroy');
    });

    // Hanya Apoteker bisa input obat & resep
    Route::middleware('role:apoteker')->group(function () {
        Route::get('/pemeriksaan/{id}/obat', [PemeriksaanController::class, 'formObat'])->name('pemeriksaan.obat.form');
        Route::post('/pemeriksaan/{id}/obat', [PemeriksaanController::class, 'storeObat'])->name('pemeriksaan.obat.store');

        Route::get('/resep/{id}', [PemeriksaanController::class, 'apotekerForm'])->name('apoteker.form');
        Route::post('/resep/{id}', [PemeriksaanController::class, 'storeApoteker'])->name('apoteker.store');

        Route::resource('/obat', ObatController::class)->only(['index', 'create', 'store', 'update', 'edit', 'destroy']);
    });
    
    // Semua role bisa lihat pasien & detail
    Route::resource('/pasien', PasienController::class)->only(['index', 'show']);
    Route::get('/pasien/{id}/detail', [PasienController::class, 'show'])->name('pasien.detail');

});


require __DIR__.'/auth.php';
