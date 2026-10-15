<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Rute Halaman Utama / Dashboard
Route::get('/', [BarangController::class, 'dashboard'])->name('dashboard');

// Resource Route untuk seluruh fungsi CRUD Barang (index, create, store, edit, update, destroy)
Route::resource('barang', BarangController::class);

// Rute Bawaan
Route::get('/halo', function () {
    return 'Halo! Selamat datang di modul pemrograman web XI RPL.';
});

Route::get('/profil', function () {
    $nama = 'Siswa XI RPL';
    $kelas = 'XI RPL';
    return view('profil', compact('nama', 'kelas'));
});