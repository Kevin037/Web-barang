<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TipeUserController;
use App\Http\Controllers\UserController;


    Route::get('/home',[DashboardController::class,'index'])->name('home');
    Route::post('/tambah-kategori',[KategoriProdukController::class,'tambah']);
    Route::get('/edit-kategori{id}',[KategoriProdukController::class,'edit']);
    Route::post('/update-kategori{id}',[KategoriProdukController::class,'update']);
    Route::get('/kategori-produk',[KategoriProdukController::class,'index']);
    Route::get('/produk',[ProdukController::class,'index']);
    Route::post('/tambah-produk',[ProdukController::class,'tambah']);
    Route::get('/edit-produk{id}',[ProdukController::class,'edit']);
    Route::post('/update-produk{id}',[ProdukController::class,'update']);
    
    Route::get('/excel-user',[UserController::class,'excel_user']);

Route::group(['middleware' => 'admin' ],function(){
    Route::get('/hapus-kategori{id}',[KategoriProdukController::class,'hapus']);
    Route::get('/hapus-produk{id}',[ProdukController::class,'hapus']);
    Route::get('/tipe-user',[TipeUserController::class,'index']);
    Route::get('/edit-tipe-user{id}',[TipeUserController::class,'edit']);
    Route::post('/update-tipe-user{id}',[TipeUserController::class,'update']);
    Route::get('/user',[UserController::class,'index']);
});

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/pilih-kategori{id}', [HomeController::class, 'kategori']);
Route::get('/tampil-cv',[HomeController::class,'tampil_cv']);

