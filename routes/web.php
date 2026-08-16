<?php

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

Route::get('/cart', function () {
    return view('storefront.cart');
})->name('cart');
