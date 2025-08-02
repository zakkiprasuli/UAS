<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Halaman awal
Route::get('/', function () {
    return view('home');
});

// Autentikasi
Auth::routes();

// Halaman dashboard setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Semua route di bawah ini hanya untuk user yang login
Route::middleware('auth')->group(function () {
    // CRUD Produk
    Route::resource('products', ProductController::class);

    // CRUD Kategori
    Route::resource('categories', CategoryController::class);

    // Menyimpan rating untuk produk
    Route::post('/products/{product}/ratings', [RatingController::class, 'store'])->name('ratings.store');
});
