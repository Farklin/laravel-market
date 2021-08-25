<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController; 

use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Middleware\Authenticate; 
use App\Http\Controllers\ImageProductController; 
use App\Http\Controllers\Admin\AdminController; 
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
Route::get('/product/{id}', [ProductController::class, 'show'])->name('show_product'); 



//картинки товара
Route::post('/image_product/delete', [ImageProductController::class, 'delete'])->name('image_product_delete'); 

//категория 
Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category'); 


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Административаная часть
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home'); 

// категория



//товар админ 
Route::get('/admin/product/all/', [App\Http\Controllers\Admin\ProductController::class, 'all'])->name('admin.product.all'); 

Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'form_create'])->name('admin.product.form.create'); 
Route::post('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create'); 

Route::get('/admin/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'form_update'])->name('admin.product.form.update'); 
Route::post('/admin/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update'); 

Route::get('/admin/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete'); 


Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'form_create'])->name('admin.category.form.create'); 
Route::post('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');

Route::get('/admin/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'form_update'])->name('admin.category.form.update'); 
Route::post('/admin/category/create/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');

Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete'); 

Route::get('/admin/category/all', [App\Http\Controllers\Admin\CategoryController::class, 'all'])->name('admin.category.all'); 