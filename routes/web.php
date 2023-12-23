<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AlternatifApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\RuteController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// LOGIN
Route::get('/', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTRASI
Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');

// VERIFIKASI LOGIN
Route::group(['middleware' => ['auth', 'cekjabatan:admin,driver,kepala gudang']], function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // DATA PENGGUNA
    Route::get('/data_pengguna', [PenggunaController::class, 'index'])->name('data_pengguna');
    Route::get('/create_pengguna', [PenggunaController::class, 'create'])->name('create_pengguna');
    Route::post('/simpan_pengguna', [PenggunaController::class, 'store'])->name('simpan_pengguna');
    Route::get('/edit_pengguna/{id}', [PenggunaController::class, 'edit'])->name('edit_pengguna');
    Route::post('/update_pengguna/{id}', [PenggunaController::class, 'update'])->name('update_pengguna');
    Route::get('/hapus_pengguna/{id}', [PenggunaController::class, 'destroy'])->name('hapus_pengguna');

    // DATA KRITERIA
    Route::get('/Data_Kriteria', [KriteriaController::class, 'index'])->name('Data_Kriteria');
    Route::get('/create_kriteria', [KriteriaController::class, 'create'])->name('create_kriteria');
    Route::post('/simpan_kriteria', [KriteriaController::class, 'store'])->name('simpan_kriteria');
    Route::get('/edit_kriteria/{id}', [KriteriaController::class, 'edit'])->name('edit_kriteria');
    Route::post('/update_kriteria/{id}', [KriteriaController::class, 'update'])->name('update_kriteria');
    Route::get('/hapus_kriteria/{id}', [KriteriaController::class, 'destroy'])->name('hapus_kriteria');

    // DATA ALTERNATIF
    Route::get('/data_alternatif', [AlternatifController::class, 'index'])->name('data_alternatif');
    Route::get('/create_alternatif', [AlternatifController::class, 'create'])->name('create_alternatif');
    Route::post('/simpan_alternatif', [AlternatifController::class, 'store'])->name('simpan_alternatif');
    Route::get('/edit_alternatif/{id}', [AlternatifController::class, 'edit'])->name('edit_alternatif');
    Route::post('/update_alternatif/{id}', [AlternatifController::class, 'update'])->name('update_alternatif');
    Route::get('/hapus_alternatif/{id}', [AlternatifController::class, 'destroy'])->name('hapus_alternatif');

    // DATA PERMINTAAN
    Route::get('/data_permintaan', [PermintaanController::class, 'index'])->name('data_permintaan');
    Route::get('/create_permintaan', [PermintaanController::class, 'create'])->name('create_permintaan');
    Route::post('/simpan_permintaan', [PermintaanController::class, 'store'])->name('simpan_permintaan');
    Route::get('/edit_permintaan/{id}', [PermintaanController::class, 'edit'])->name('edit_permintaan');
    Route::post('/update_permintaan/{id}', [PermintaanController::class, 'update'])->name('update_permintaan');
    Route::get('/hapus_permintaan/{id}', [PermintaanController::class, 'destroy'])->name('hapus_permintaan');

    // DATA PRODUKSI
    Route::get('/data_produksi', [ProduksiController::class, 'index'])->name('data_produksi');
    Route::get('/create_produksi', [ProduksiController::class, 'create'])->name('create_produksi');
    Route::post('/simpan_produksi', [ProduksiController::class, 'store'])->name('simpan_produksi');
    Route::get('/edit_produksi/{id}', [ProduksiController::class, 'edit'])->name('edit_produksi');
    Route::post('/update_produksi/{id}', [ProduksiController::class, 'update'])->name('update_produksi');
    Route::get('/hapus_produksi/{id}', [ProduksiController::class, 'destroy'])->name('hapus_produksi');

    // STOK
    Route::get('/data_stok', [StokController::class, 'index'])->name('data_stok');
    Route::get('/create_stok', [StokController::class, 'create'])->name('create_stok');
    Route::post('/simpan_stok', [StokController::class, 'store'])->name('simpan_stok');
    Route::get('/edit_stok/{id}', [StokController::class, 'edit'])->name('edit_stok');
    Route::post('/update_stok/{id}', [StokController::class, 'update'])->name('update_stok');
    Route::get('/hapus_stok/{id}', [StokController::class, 'destroy'])->name('hapus_stok');

    // DATA RUTE
    Route::get('/data_rute', [RuteController::class, 'index'])->name('data_rute');
    Route::get('/create_rute', [RuteController::class, 'create'])->name('create_rute');
    Route::post('/simpan_rute', [RuteController::class, 'store'])->name('simpan_rute');
    Route::get('/edit_rute/{id}', [RuteController::class, 'edit'])->name('edit_rute');
    Route::post('/update_rute/{id}', [RuteController::class, 'update'])->name('update_rute');
    Route::get('/hapus_rute/{id}', [RuteController::class, 'destroy'])->name('hapus_rute');

    // REKOMENDASI RUTE
    Route::get('/wpm', [RuteController::class, 'wpm'])->name('wpm');
});
