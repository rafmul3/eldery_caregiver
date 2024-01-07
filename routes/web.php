<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\http\Livewire\Maps;
use App\http\Livewire\CreateMap;
use App\http\Livewire\CreateMapPengasuh;



Route::middleware('auth')->group(function () {
    Route::get('/infopengasuh', function () {
        return view('user/infopengasuh');
    });
    Route::get('/detailpesanan', function () {
        return view('user/detailpesanan');
    });
    Route::get('/editprofilepengasuh', function () {
        return view('pengasuh/editprofilepengasuh');
    });
    Route::get('/editprofileuser', function () {
        return view('user/editprofile');
    });
    Route::resource('/profile', ProfileController::class)->parameters([
        'profile' => 'user:username',

    ]);
    Route::resource('/order', OrderController::class);
    Route::post('order/rating/{id}', [UserController::class, "rating"]);
    Route::post('/download', [UserController::class, "download"]);
    Route::post('/artikel/update/{id}', [ArtikelController::class, "updateArtikel"]);
    Route::post('/pelamar/deleted', [UserController::class, "pelamardel"]);
    Route::post('/pelamar/konfirmasi', [UserController::class, "konfirmasi"]);
    Route::post('/postingartikel', [ArtikelController::class, "posting"]);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/cari', [ArtikelController::class, "index"]);
    Route::get('/dashboard', [ArtikelController::class, "dashboard"]);
    Route::get('/homeartikel', [ArtikelController::class, "show"]);
    Route::get('/detailuser/{user}', [UserController::class, "detail"]);
    Route::get('/artikel/edit/{id}', [ArtikelController::class, "editartikel"]);
    Route::get('/lokasi', Maps::class);
    Route::get('/artikel/hapus/{id}', [ArtikelController::class, "hapusartikel"]);
    Route::get('/listpengasuh', [UserController::class, 'listpengasuh']);
    Route::get('/listuser', [UserController::class, 'listuser']);
    Route::get('/infopengasuh/{id}', [UserController::class, 'detailuser']);
    Route::get('/chatuser/{user}', [UserController::class, "chatuserparam"]);
    Route::get('/detailpesan', [UserController::class, "detailpesan"]);
    Route::get('/chatuser', [UserController::class, "chatuser"]);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, "loginview"])->name('login');
    Route::get('/regisuser', CreateMap::class);
    Route::get('/regispengasuh', CreateMapPengasuh::class);
    Route::post('/regispengasuh', [UserController::class, "registerpelamar"]);
    Route::post('/regisuser', [UserController::class, "registeruser"]);
    Route::post('/login', [UserController::class, "login"]);
});

Route::get('/', [ArtikelController::class, "index"]);





