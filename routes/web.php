<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;

// Route CRUD untuk Pemesanan
Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.read');
Route::get('/pemesanan/create', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan/show/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::get('/pemesanan/edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::put('/pemesanan/update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::delete('/pemesanan/delete/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.delete');

// Route Tambahan: Untuk Riwayat Pemesanan yang Dihapus
Route::get('/pemesanan/riwayat', [PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
Route::patch('/pemesanan/restore/{id}', [PemesananController::class, 'restore'])->name('pemesanan.restore');
Route::delete('/pemesanan/forceDelete/{id}', [PemesananController::class, 'forceDelete'])->name('pemesanan.forceDelete');
