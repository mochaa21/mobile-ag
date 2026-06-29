<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriPrestasiController;
use App\Http\Controllers\RiwayatPrestasiController;

Route::get('/', function () {
    return redirect()->route('data-riwayat');
});

// ==========================================
// ROUTE YANG WAJIB LOGIN DULU (Mahasiswa & Admin bisa akses)
// ==========================================
Route::middleware(['auth'])->group(function () {
    
    Route::get('/data-riwayat', [RiwayatPrestasiController::class, 'index'])->name('data-riwayat');
    Route::get('/tambah-riwayat', [RiwayatPrestasiController::class, 'create'])->name('tambah-riwayat');
    Route::post('/simpan-riwayat', [RiwayatPrestasiController::class, 'store'])->name('store-riwayat');

    // ==========================================
    // ROUTE KHUSUS ADMIN (Hanya akun Admin yang bisa akses)
    // ==========================================
    Route::middleware(['admin'])->group(function () {
        
        // Fitur ACC/Tolak
        Route::get('/validasi-riwayat/{id}/{status}', [RiwayatPrestasiController::class, 'validasi'])->name('validasi-riwayat');
        Route::delete('/hapus-riwayat/{id}', [RiwayatPrestasiController::class, 'destroy'])->name('hapus-riwayat');

        // Master Mahasiswa
        Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('data-mahasiswa');
        Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('tambah-mahasiswa');
        Route::post('/simpan-mahasiswa', [MahasiswaController::class, 'store'])->name('store-mahasiswa');
        Route::get('/edit-mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
        Route::post('/update-mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('update-mahasiswa');
        Route::delete('/hapus-mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('hapus-mahasiswa');

        // Master Kategori
        Route::get('/data-kategori', [KategoriPrestasiController::class, 'index'])->name('data-kategori');
        Route::get('/tambah-kategori', [KategoriPrestasiController::class, 'create'])->name('tambah-kategori');
        Route::post('/simpan-kategori', [KategoriPrestasiController::class, 'store'])->name('store-kategori');
        Route::get('/edit-kategori/{id}', [KategoriPrestasiController::class, 'edit'])->name('edit-kategori');
        Route::post('/update-kategori/{id}', [KategoriPrestasiController::class, 'update'])->name('update-kategori');
        Route::delete('/hapus-kategori/{id}', [KategoriPrestasiController::class, 'destroy'])->name('hapus-kategori');
        
    });
});


require __DIR__.'/auth.php';