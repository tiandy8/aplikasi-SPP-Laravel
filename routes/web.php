<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;

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
// Untuk redirect / ke halaman login
Route::get('/', function () {
    return redirect('/login/petugas');
});

// Route untuk menampilkan login
Route::middleware('guest:siswa,petugas')->group(function () {
    Route::prefix('login')->name('login.')->group(function(){
        Route::get('/petugas',[PetugasController::class,'login'])->name('petugas');
        Route::post('/petugas',[PetugasController::class,'processLogin'])->name('petugas.process');

        Route::get('/siswa',[SiswaController::class,'login'])->name('siswa');
        Route::post('/siswa',[SiswaController::class,'processLogin'])->name('siswa.process');
    });
});

// Route untuk logout petugas maupun siswa
Route::get('/logout',[PetugasController::class, 'logout'])->name('logout');

// Route untuk middleware petugas
Route::middleware('auth:petugas')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        // Route Dashboard
        Route::get('/dashboard',[PetugasController::class, 'dashboard'])->name('dashboard');




        // Route CRUD Siswa
        Route::get('/siswa',[SiswaController::class, 'index'])->name('siswa');
        Route::get('/siswa/create',[SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/create',[SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{nisn}',[SiswaController::class, 'edit'])->name('siswa.edit');
        Route::post('/siswa/edit/{nisn}',[SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/delete/{nisn}',[SiswaController::class, 'destroy'])->name('siswa.delete');

        // Route CRUD Kelas
        Route::get('/kelas',[KelasController::class, 'index'])->name('kelas');
        Route::get('/kelas/create',[KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas/create',[KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas/edit/{id_kelas}',[KelasController::class, 'edit'])->name('kelas.edit');
        Route::post('/kelas/edit/{id_kelas}',[KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/kelas/delete/{id_kelas}',[KelasController::class, 'destroy'])->name('kelas.delete');

        // Route CRUD Petugas
        Route::get('/petugas',[PetugasController::class, 'index'])->name('petugas');
        Route::get('/petugas/create',[PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/petugas/create',[PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/edit/{id_petugas}',[PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/petugas/edit/{id_petugas}',[PetugasController::class, 'update'])->name('petugas.update');
        Route::delete('/petugas/delete/{id_petugas}',[PetugasController::class, 'destroy'])->name('petugas.delete');

        // Route CRUD SPP
        Route::get('/spp',[SppController::class, 'index'])->name('spp');
        Route::get('/spp/create',[SppController::class, 'create'])->name('spp.create');
        Route::post('/spp/create',[SppController::class, 'store'])->name('spp.store');
        Route::get('/spp/edit/{id_spp}',[SppController::class, 'edit'])->name('spp.edit');
        Route::post('/spp/edit/{id_spp}',[SppController::class, 'update'])->name('spp.update');
        Route::delete('/spp/delete/{id_spp}',[SppController::class, 'destroy'])->name('spp.delete');

        // Laporan
        Route::get('/laporan',[PembayaranController::class, 'index'])->name('laporan');
        Route::get('/laporan/create',[PembayaranController::class, 'create'])->name('laporan.create');
        Route::post('/laporan/create',[PembayaranController::class, 'store'])->name('laporan.store');
        Route::get('/laporan/siswa/{nisn}',[PembayaranController::class,'show'])->name('laporan.siswa');
        Route::get('/laporan/cetak',[PembayaranController::class,'cetak'])->name('laporan.cetak');
        Route::get('/laporan/cetak/siswa/{nisn}',[PembayaranController::class,'cetakSiswa'])->name('laporan.cetak.siswa');




    });
});

Route::middleware('auth:siswa')->group(function () {
    Route::prefix('siswa')->name('siswa.')->group(function(){
        Route::get('/dashboard/{nisn}',[SiswaController::class, 'dashboard'])->name('dashboard');
    });
});

