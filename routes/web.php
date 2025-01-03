<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class)->middleware('auth');

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (hanya untuk pengguna yang terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Produk (CRUD, hanya untuk pengguna yang sudah login)
Route::middleware('auth')->group(function () {
    

    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// File rute untuk autentikasi (register, login, dll.)
require __DIR__.'/auth.php';
