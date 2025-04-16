<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProductsManager;
use App\Http\Controllers\OrderManager;
Route::get('/', [ProductsManager::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductsManager::class, 'details'])->name('details');



Route::controller(AuthManager::class)->group(callback: function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart/{id}', [ProductsManager::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [ProductsManager::class, 'showCart'])->name('showCart');
    Route::get('/checkout', [OrderManager::class, 'checkout'])->name('checkout');
    Route::post('/payment', [OrderManager::class, 'paymentProcess'])->name('paymentProcess');
    Route::get('/orders', action: [OrderManager::class, 'orders'])->name('orders');
});
