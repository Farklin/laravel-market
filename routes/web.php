<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 

use App\Http\Controllers\ProductController; 
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

Route::get('/', [ProductController::class, 'all_product']);


// товар
Route::get('/product/create', [ProductController::class, 'form_create'])->name('form_product_create'); 
Route::post('/product/create', [ProductController::class, 'create'])->name('product_create'); 
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show_product'); 