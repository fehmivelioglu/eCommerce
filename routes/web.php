<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(AuthManager::class)->group(callback: function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
});
