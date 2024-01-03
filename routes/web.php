<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
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

Route::get('/',[HomeController::class,'index']);



Auth::routes();




Route::middleware(['auth'])->controller(PengaduanController::class)->group(function () {
    Route::get('/pengaduan', 'index')->name('pengaduan');
    Route::post('/create-pengaduan', 'store')->name('pengaduan-create');
    Route::get('/history', 'showData')->name('history');
    Route::get('/detail-pengaduan/{id}', 'showDetail')->name('history_detail');

});


// Route::middleware(['auth', 'cekStatus:petugas'])->group(function () {
//     Route::controller(AdminController::class)->group(function () {
//         Route::get('/dashboard', 'index')->name('dashboard');

//     });

//     Route::controller(TanggapanController::class)->group(function () {
//         Route::get('/tanggapan', 'index')->name('tanggapan');
//         Route::get('/dasboard-masyarakat/search', 'index')->name('search-masyarakat');
//         Route::get('/tanggapan/detail/{id}', 'show')->name('tanggapan.detail');
//         Route::post('/tanggapan/detail/{id}', 'store')->name('tanggapan.tanggpan');
//     });
// });


Route::middleware(['auth', 'cekStatus'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');

    });

    Route::controller(PetugasController::class)->group(function () {
        Route::get('/petugas', 'index')->name('petugas');
        Route::post('/petugas', 'store')->name('createPetugas');
        Route::get('/petugas/search', 'search')->name('search');
        Route::get('/petugas/edit/{id}', 'edit')->name('edit');
        Route::put('/petugas/update/{id}', 'update')->name('update');
        Route::get('/petugas/delete/{id}', 'destroy')->name('petugas.delete');

    });

    Route::controller(MasyarakatController::class)->group(function () {
        Route::get('/dasboard-masyarakat', 'index')->name('masyarakat');
        Route::get('/dasboard-masyarakat/search', 'index')->name('search-masyarakat');
    });

    Route::controller(TanggapanController::class)->group(function () {
        Route::get('/tanggapan', 'index')->name('tanggapan');
        Route::post('/tanggapan', 'index')->name('tanggapan.filter');
        Route::get('/tanggapan/search', 'index')->name('search-tanggapan');
        Route::get('/tanggapan/detail/{id}', 'show')->name('tanggapan.detail');
        Route::post('/tanggapan/detail/{id}', 'store')->name('tanggapan.tanggpan');
    });
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan', 'index')->name('laporan');
        Route::post('/laporan/getData', 'getLaporan')->name('laporan.filter');
        Route::get('/laporan/cetak/{tglMulai}/{tglAkhir}', 'cetak')->name('laporan.cetak');
    });



});

