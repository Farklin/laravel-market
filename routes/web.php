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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/all', [ProductController::class, 'all_product'])->name('all_product');


// товар
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show'); 



//картинки товара
Route::post('/image_product/delete', [ImageProductController::class, 'delete'])->name('image_product_delete'); 

//категория 
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category'); 


Auth::routes();

Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'index'])->name('page'); 



// корзина 
Route::get('/basket/all', [App\Http\Controllers\BasketController::class, 'index'])->name('basket.all'); 
Route::get('/basket/checkout', [App\Http\Controllers\BasketController::class, 'checkout'])->name('basket.checkout'); 
Route::post('/basket/add/{id}', [App\Http\Controllers\BasketController::class, 'add'])->name('basket.add'); 
Route::post('/basket/modal', [App\Http\Controllers\BasketController::class, 'modal'])->name('basket.modal'); 
Route::post('/basket/object', [App\Http\Controllers\BasketController::class, 'object'])->name('basket.object'); 

Route::post('/basket/product/delete/', [App\Http\Controllers\BasketController::class, 'product_delete'])->name('basket.product.delete');  
Route::post('/basket/product/plus/{id}', [App\Http\Controllers\BasketController::class, 'plus'])->name('basket.product.plus'); 
Route::post('/basket/product/minus/{id}', [App\Http\Controllers\BasketController::class, 'minus'])->name('basket.product.minus'); 
Route::post('/basket/checkout/save', [App\Http\Controllers\BasketController::class, 'saveOrder'])->name('basket.checkout.save'); 
Route::get('/basket/success', [App\Http\Controllers\BasketController::class, 'success'])->name('basket.success'); 

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function(){
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'orders'])->name('orders'); 
    Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'order'])->name('order'); 
}); 



//Административаная часть


Route::middleware(['auth', 'isadmin'])->prefix('admin')->name('admin.')->group(function(){
    //товар админ 
    Route::get('/', [AdminController::class, 'index'])->name('home'); 
    Route::get('/product/all/', [App\Http\Controllers\Admin\ProductController::class, 'all'])->name('product.all'); 

    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'form_create'])->name('product.form.create'); 
    Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create'); 

    Route::get('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'form_update'])->name('product.form.update'); 
    Route::post('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update'); 

    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete'); 
    // Экспорт товаров 
    Route::get('product/import', [App\Http\Controllers\Admin\ProductController::class, 'import'])->name('product.import');


    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'form_create'])->name('category.form.create'); 
    Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');

    Route::get('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'form_update'])->name('category.form.update'); 
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete'); 

    Route::get('/category/all', [App\Http\Controllers\Admin\CategoryController::class, 'all'])->name('category.all'); 

    Route::get('/page/all', [App\Http\Controllers\Admin\PageController::class, 'all'])->name('page.all'); 
    Route::get('/page/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('page.create'); 
    Route::post ('/page/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('page.create'); 
    Route::get('/page/update/{id}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('page.update'); 
    Route::post('/page/update/{id}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('page.update'); 
    Route::get('/page/delete/{id}', [App\Http\Controllers\Admin\PageController::class, 'delete'])->name('page.delete'); 

   

}); 

    

