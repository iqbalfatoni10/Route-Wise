<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifApiController;
use App\Http\Controllers\KriteriaApiController;
use App\Http\Controllers\PenggunaApiController;
use App\Http\Controllers\ProduksiApiController;
use App\Http\Controllers\StokApiController;
use App\Http\Controllers\PermintaanApiController;
use App\Http\Controllers\RuteApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// DATA ALTERNATIF
Route::get('/data_alternatif', [AlternatifApiController::class, 'index'])->name('data_alternatif');
Route::post('/simpan_alternatif', [AlternatifApiController::class, 'store'])->name('simpan_alternatif');
Route::get('/edit_alternatif/{id}', [AlternatifApiController::class, 'edit'])->name('edit_alternatif');
Route::get('/tampil_alternatif/{id}', [AlternatifApiController::class, 'show'])->name('tampil_alternatif');
Route::put('/update_alternatif/{id}', [AlternatifApiController::class, 'update'])->name('update_alternatif');
Route::delete('/hapus_alternatif/{id}', [AlternatifApiController::class, 'destroy'])->name('hapus_alternatif');

// DATA KRITERIA
Route::get('/data_kriteria', [KriteriaApiController::class, 'index'])->name('data_kriteria');
Route::post('/simpan_kriteria', [KriteriaApiController::class, 'store'])->name('simpan_kriteria');
Route::get('/edit_kriteria/{id}', [KriteriaApiController::class, 'edit'])->name('edit_kriteria');
Route::get('/tampil_kriteria/{id}', [KriteriaApiController::class, 'show'])->name('tampil_kriteria');
Route::put('/update_kriteria/{id}', [KriteriaApiController::class, 'update'])->name('update_kriteria');
Route::delete('/hapus_kriteria/{id}', [KriteriaApiController::class, 'destroy'])->name('hapus_kriteria');

// DATA PENGGUNA
Route::get('/data_pengguna', [PenggunaApiController::class, 'index'])->name('data_pengguna');
Route::post('/simpan_pengguna', [PenggunaApiController::class, 'store'])->name('simpan_pengguna');
Route::get('/edit_pengguna/{id}', [PenggunaApiController::class, 'edit'])->name('edit_pengguna');
Route::get('/tampil_pengguna/{id}', [PenggunaApiController::class, 'show'])->name('tampil_pengguna');
Route::put('/update_pengguna/{id}', [PenggunaApiController::class, 'update'])->name('update_pengguna');
Route::delete('/hapus_pengguna/{id}', [PenggunaApiController::class, 'destroy'])->name('hapus_pengguna');

// DATA PRODUKSI
Route::get('/data_produksi', [ProduksiApiController::class, 'index'])->name('data_produksi');
Route::post('/simpan_produksi', [ProduksiApiController::class, 'store'])->name('simpan_produksi');
Route::get('/edit_produksi/{id}', [ProduksiApiController::class, 'edit'])->name('edit_produksi');
Route::get('/tampil_produksi/{id}', [ProduksiApiController::class, 'show'])->name('tampil_produksi');
Route::put('/update_produksi/{id}', [ProduksiApiController::class, 'update'])->name('update_produksi');
Route::delete('/hapus_produksi/{id}', [ProduksiApiController::class, 'destroy'])->name('hapus_produksi');

// DATA STOK
Route::get('/data_produk', [StokApiController::class, 'index'])->name('data_produk');
Route::post('/simpan_produk', [StokApiController::class, 'store'])->name('simpan_produk');
Route::get('/edit_produk/{id}', [StokApiController::class, 'edit'])->name('edit_produk');
Route::get('/tampil_produk/{id}', [StokApiController::class, 'show'])->name('tampil_produk');
Route::put('/update_produk/{id}', [StokApiController::class, 'update'])->name('update_produk');
Route::delete('/hapus_produk/{id}', [StokApiController::class, 'destroy'])->name('hapus_produk');

// DATA PERMINTAAN
Route::get('/data_permintaan', [PermintaanApiController::class, 'index'])->name('data_permintaan');
Route::post('/simpan_permintaan', [PermintaanApiController::class, 'store'])->name('simpan_permintaan');
Route::get('/edit_permintaan/{id}', [PermintaanApiController::class, 'edit'])->name('edit_permintaan');
Route::get('/tampil_permintaan/{id}', [PermintaanApiController::class, 'show'])->name('tampil_permintaan');
Route::put('/update_permintaan/{id}', [PermintaanApiController::class, 'update'])->name('update_permintaan');
Route::delete('/hapus_permintaan/{id}', [PermintaanApiController::class, 'destroy'])->name('hapus_permintaan');

// DATA RUTE
Route::get('/data_rute', [RuteApiController::class, 'index'])->name('data_rute');
Route::post('/simpan_rute', [RuteApiController::class, 'store'])->name('simpan_rute');
Route::get('/edit_rute/{id}', [RuteApiController::class, 'edit'])->name('edit_rute');
Route::get('/tampil_rute/{id}', [RuteApiController::class, 'show'])->name('tampil_rute');
Route::put('/update_rute/{id}', [RuteApiController::class, 'update'])->name('update_rute');
Route::delete('/hapus_rute/{id}', [RuteApiController::class, 'destroy'])->name('hapus_rute');

// REKOMENDASI RUTE
Route::get('/wpm', [RuteApiController::class, 'wpm'])->name('wpm');
