<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PeminjamanBukuController;

// Welcome Page
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard - Ganti pakai PeminjamanBukuController
Route::get('/index', [PeminjamanBukuController::class, 'index'])->name('dashboard');

// Authentication
Route::get('/login', [AuthController::class, 'loginUser'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/index', [PeminjamanBukuController::class, 'index'])->name('dashboard');

    // Anggota Routes
    Route::prefix('anggota')->group(function () {
        Route::get('/', [AnggotaController::class, 'index'])->name('index.anggota');
        Route::get('/create', [AnggotaController::class, 'create'])->name('create.anggota');
        Route::post('/create', [AnggotaController::class, 'store'])->name('store.anggota');
        Route::get('/edit/{id}', [AnggotaController::class, 'edit'])->name('edit.anggota');
        Route::put('/edit/{anggota}', [AnggotaController::class, 'update'])->name('update.anggota');
        Route::delete('/{anggota}', [AnggotaController::class, 'destroy'])->name('delete.anggota');
        Route::get('/cetakanggota', [AnggotaController::class, 'cetakAnggota'])->name('anggota.cetak');
    });

    // Buku Routes
    Route::prefix('buku')->group(function () {
        Route::get('/', [BukuController::class, 'index'])->name('index.buku');
        Route::get('/create', [BukuController::class, 'create'])->name('create.buku');
        Route::post('/create', [BukuController::class, 'store'])->name('store.buku');
        Route::get('/edit/{buku}', [BukuController::class, 'edit'])->name('edit.buku');
        Route::put('/edit/{buku}', [BukuController::class, 'update'])->name('update.buku');
        Route::delete('/{buku}', [BukuController::class, 'destroy'])->name('delete.buku');
    });

    // Transaksi Routes
    Route::prefix('transaksi')->group(function(){
        Route::get('/', [TransaksiController::class, 'index'])->name('index.transaksi');
        Route::get('/create', [TransaksiController::class, 'create'])->name('create.transaksi');
        Route::post('/create', [TransaksiController::class, 'store'])->name('store.transaksi');
        Route::get('/edit/{transaksi}', [TransaksiController::class, 'edit'])->name('edit.transaksi');
        Route::put('/edit/{transaksi}', [TransaksiController::class, 'update'])->name('update.transaksi');
        Route::delete('/{transaksi}', [TransaksiController::class, 'destroy'])->name('delete.transaksi');
        Route::get('/cetak', [TransaksiController::class, 'cetakTransaksi'])->name('transaksi.cetak');
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});