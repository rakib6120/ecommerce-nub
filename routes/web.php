<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('storefront.home');
})->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/product/{slug}', [ShopController::class, 'show'])->name('product.show');

Route::get('/about', function () {
    return view('storefront.about');
})->name('about');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
