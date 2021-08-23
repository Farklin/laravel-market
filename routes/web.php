<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CategoryController; 

use App\Http\Controllers\ImageProductController; 
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

Route::get('/', [ProductController::class, 'all_product'])->name('all_product');


// товар
Route::get('/product/create', [ProductController::class, 'form_create'])->name('form_product_create'); 
Route::get('/product/update/{id}', [ProductController::class, 'form_update'])->name('form_product_update'); 
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product_update'); 
Route::post('/product/create', [ProductController::class, 'create'])->name('product_create'); 
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show_product'); 


// категория
Route::get('/category/create', [CategoryController::class, 'form_create'])->name('form_create'); 
Route::post('/category/create', [CategoryController::class, 'create'])->name('category_create'); 

//картинки товара
Route::post('/image_product/delete', [ImageProductController::class, 'delete'])->name('image_product_delete'); 


Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category'); 
