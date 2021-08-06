<?php

use App\Http\Controllers\administrator\categoryController;
use App\Http\Controllers\administrator\currencyController;
use App\Http\Controllers\administrator\customerController;
use App\Http\Controllers\administrator\exchangeController;
use App\Http\Controllers\administrator\homeController;
use App\Http\Controllers\administrator\loginController;
use App\Http\Controllers\administrator\ordersController;
use App\Http\Controllers\administrator\productsController;
use App\Http\Controllers\administrator\usersController;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['prefix'=>'administrator'],function() {
    Route::get('/',[homeController::class,'index'])->name('admin.home');
    Route::resource('/Admin-login',loginController::class);
    Route::resource('/Admin-users',usersController::class);
    Route::resource('/Admin-currency',currencyController::class);
    Route::resource('/Admin-category',categoryController::class);
    Route::resource('/Admin-products',productsController::class);
    Route::resource('/Admin-rates',exchangeController::class);
    Route::resource('/Admin-customers',customerController::class);
    Route::resource('/Admin-orders',ordersController::class);
});