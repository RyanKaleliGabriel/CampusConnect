<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CpoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customerspage', [CpoController::class, 'viewallcustomers'])->name('customers');
Route::get('customer/make', [CpoController::class, 'createcustomer'])->name('createcustomer');
Route::post('customer', [CpoController::class, 'storecustomer'])->name('storecustomer');
Route::get('customer/{customer}/edit', [CpoController::class, 'editcustomer'])->name('editcustomer');
Route::put('customer/{customer}', [CpoController::class, 'updatecustomer'])->name('updatecustomer');
Route::delete('customer/{customer}', [CpoController::class, 'destroycustomer'])->name('deletecustomer');

Route::get('/productspage', [CpoController::class, 'viewallproducts'])->name('products');
Route::get('product/create', [CpoController::class, 'createproduct'])->name('createproduct');
Route::post('product', [CpoController::class, 'storeproduct'])->name('storeproduct');
Route::get('product/{product}/edit', [CpoController::class, 'editproduct'])->name('editproduct');
Route::put('product/{product}', [CpoController::class, 'updateproduct'])->name('updateproduct');
Route::delete('product/{product}', [CpoController::class, 'destroyproduct'])->name('deleteproduct');

Route::get('/orderspage', [CpoController::class, 'viewallorders'])->name('orders');
Route::get('order/create', [CpoController::class, 'createorder'])->name('createorder');
Route::post('order', [CpoController::class, 'storeorder'])->name('storeorder');
Route::get('order/{order}/edit', [CpoController::class, 'editorder'])->name('editorder');
Route::put('order/{order}', [CpoController::class, 'updateorder'])->name('updateorder');
Route::delete('order/{order}', [CpoController::class, 'destroyorder'])->name('deleteorder');