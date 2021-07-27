<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\productsController;
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
Route::get('/product/{id}',[productsController::class,'show'])->name('shop.product');
Route::get('/product/{id}/by-category',[productsController::class,'edit'])->name('shop.category');
Route::resource('/Cart',CartController::class);
Route::get('/Clear-cart',[CartController::class,'clearcart'])->name('clear-cart');
Route::get('/Cart-reduce-qty/{rowid}',[CartController::class,'decreaseqty'])->name('cart-reduce-qty');
Route::get('/Cart-increase-qty/{rowid}',[CartController::class,'increaseqty'])->name('cart-increase-qty');
Route::get('/Car-currency-change/{id}',[CartController::class,'changecurrency'])->name('cart-currency-change');
Route::get('/Cart-item-remove/{id}',[CartController::class,'removeitem'])->name('cart-remove-item');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
