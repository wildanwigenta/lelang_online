<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


        //  ----------------   FRONTEND PAGE   ------------------ //
Route::get('/',[App\Http\Controllers\FrontendController::class,'index']);
Route::get('/detail_lelang/{id_lelang}',[App\Http\Controllers\FrontendController::class,'detail_lelang']);
Route::post('/tawar_harga/{id_lelang}',[App\Http\Controllers\FrontendController::class,'tawar_harga']);


Auth::routes();

        //  ----------------   ADMIN PAGE   ------------------ //
Route::prefix('admin')->middleware(['auth','admin-level'])->group(function(){

    Route::get('/',[App\Http\Controllers\DashboardController::class,'index']);
    Route::get('/laporan_lelang',[App\Http\Controllers\DashboardController::class,'laporan']);

            // USER //
    Route::get('/user',[App\Http\Controllers\UserController::class,'index']);
    Route::post('/user',[App\Http\Controllers\UserController::class,'index']);
    Route::get('/tambah_user',[App\Http\Controllers\UserController::class,'add_user'])->name('user');
    Route::post('/tambah_data_user',[App\Http\Controllers\UserController::class,'add_data_user'])->name('user');
    Route::get('/edit_user/{id}',[App\Http\Controllers\UserController::class,'update_user'])->name('user');
    Route::post('/edit_data_user',[App\Http\Controllers\UserController::class,'update_data_user'])->name('user');
    Route::get('/hapus_user/{id}',[App\Http\Controllers\UserController::class,'delete_user']);

            // BARANG //
    Route::get('/barang',[App\Http\Controllers\BarangController::class,'index']);
    Route::get('/tambah_barang',[App\Http\Controllers\BarangController::class,'add_barang'])->name('barang');
    Route::post('/tambah_data_barang',[App\Http\Controllers\BarangController::class,'add_data_barang'])->name('barang');
    Route::post('/tambah_barang_lelang',[App\Http\Controllers\BarangController::class,'add_barang_lelang'])->name('barang');
    Route::get('/edit_barang/{id_barang}',[App\Http\Controllers\BarangController::class,'update_barang'])->name('barang');
    Route::post('/edit_data_barang',[App\Http\Controllers\BarangController::class,'update_data_barang'])->name('barang');
    Route::get('/hapus_barang/{id_barang}',[App\Http\Controllers\BarangController::class,'delete_barang']);

        });

        //  ----------------   PETUGAS PAGE   ------------------ //
Route::prefix('petugas')->middleware(['auth','petugas-level'])->group(function(){

        Route::get('/',[App\Http\Controllers\DashboardController::class,'index']);
        Route::get('/laporan_lelang',[App\Http\Controllers\DashboardController::class,'laporan']);

    
                // BARANG //
        Route::get('/barang',[App\Http\Controllers\BarangController::class,'index']);
        Route::get('/tambah_barang',[App\Http\Controllers\BarangController::class,'add_barang'])->name('barang');
        Route::post('/tambah_data_barang',[App\Http\Controllers\BarangController::class,'add_data_barang'])->name('barang');
        Route::post('/tambah_barang_lelang',[App\Http\Controllers\BarangController::class,'add_barang_lelang'])->name('barang');
        Route::get('/edit_barang/{id_barang}',[App\Http\Controllers\BarangController::class,'update_barang'])->name('barang');
        Route::post('/edit_data_barang',[App\Http\Controllers\BarangController::class,'update_data_barang'])->name('barang');
        Route::get('/hapus_barang/{id_barang}',[App\Http\Controllers\BarangController::class,'delete_barang']);
      
                // LELANG //
        Route::get('/lelang',[App\Http\Controllers\LelangController::class,'index']);
        Route::post('/confirm_status_barang/{id_lelang}',[App\Http\Controllers\LelangController::class,'confirm_status']);
    
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


