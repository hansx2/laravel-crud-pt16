<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Halaman login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman product hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/products/download-pdf',[ProductController::class,'downloadPdf'])->name('products.pdf');
    Route::resource('products', ProductController::class);
});