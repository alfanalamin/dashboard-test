<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('status', StatusController::class);
Route::resource('orders', OrderController::class);
Route::get('/get-cities', [OrderController::class, 'getCities'])->name('get-cities');
Route::get('/get-subdistricts', [OrderController::class, 'getSubdistricts'])->name('get-subdistricts');
