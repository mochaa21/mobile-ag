<?php

use App\Http\Controllers\Api\KategoriPrestasiController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\RiwayatPrestasiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('mahasiswa', MahasiswaController::class);
Route::apiResource('kategori-prestasi', KategoriPrestasiController::class);
Route::apiResource('riwayat-prestasi', RiwayatPrestasiController::class);
