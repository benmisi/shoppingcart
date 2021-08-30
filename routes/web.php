<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\mobileController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\paynowController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\trackingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[productsController::class,'index'])->name('shop.index');
Route::post('/search',[productsController::class,'store'])->name('shop.search');
Route::get('/product/{id}',[productsController::class,'show'])->name('shop.product');
Route::get('/product/{id}/by-category',[productsController::class,'edit'])->name('shop.category');

require __DIR__.'/user.php';
require __DIR__.'/admin.php';


