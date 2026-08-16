<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('storefront.home');
})->name('home');

Route::get('/shop', function () {
    return view('storefront.shop');
})->name('shop');

Route::get('/about', function () {
    return view('storefront.about');
})->name('about');

Route::get('/cart', function () {
    return view('storefront.cart');
})->name('cart');
