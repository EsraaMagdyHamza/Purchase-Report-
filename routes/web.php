<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/purchase-report', [PurchaseController::class, 'report'])->name('purchase.report');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchase.store');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');