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
Route::get('/image_product/delete/{id}', [ImageProductController::class, 'delete'])->name('image_product_delete'); 

//категория 
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category'); 


Auth::routes();

Route::get('/page/{slug}', [App\Http\Controllers\PageController::class, 'index'])->name('page'); 
Route::get('/search', [App\Http\Controllers\CatalogController::class, 'search'])->name('search');



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

Route::get('/basket/delivery-status', [App\Http\Controllers\BasketController::class, 'delivery_status'])->name('delivery.status'); 


// Sitemap 
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.xml');

//подписка 
Route::post('/subscribe/new', [App\Http\Controllers\SubscribersController::class, 'subscribe'])->name('subscribe');

//Добавить коментарий к товару
Route::post('/comment/product/{id}', [App\Http\Controllers\CommentProductController::class, 'add'])->name('comment.product.add'); 



Route::middleware(['auth'])->prefix('user')->name('user.')->group(function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('profil'); 
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'orders'])->name('orders'); 
    Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'order'])->name('order'); 


    // поставить лайк товару 
    Route::get('/like/product/{product_id}', [App\Http\Controllers\LikeController::class, 'likeProduct'])->name('like.product'); 
    Route::get('/likes/products/', [App\Http\Controllers\LikeController::class, 'likesProducts'])->name('likes.products'); 
}); 



//Административаная часть


Route::middleware(['auth', 'isadmin'])->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('home'); 
    Route::get('/additionally', [AdminController::class, 'additionally'])->name('additionally'); 
    //товар админ 
    Route::get('/product/all/', [App\Http\Controllers\Admin\ProductController::class, 'all'])->name('product.all'); 

    Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'form_create'])->name('product.form.create'); 
    Route::post('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create'); 

    Route::get('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'form_update'])->name('product.form.update'); 
    Route::post('/product/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update'); 

    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete'); 
    // Экспорт товаров 
    Route::get('product/import', [App\Http\Controllers\Admin\ProductController::class, 'import'])->name('product.import');
    Route::get('product/export', [App\Http\Controllers\Admin\ProductController::class, 'export'])->name('product.export');


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


    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'all'])->name('order.all'); 
    Route::get('/order/{id}', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order.view'); 

    Route::get('/subscribers', [App\Http\Controllers\Admin\SubscribersController::class, 'all'])->name('subscribers.all'); 

    Route::post('/image/product/sort', [App\Http\Controllers\ImageProductController::class, 'sorting'])->name('image.sorting'); 

    //Отзвызы 
    Route::get('/comments', [App\Http\Controllers\Admin\CommentProductController::class, 'all'])->name('comment.all'); 
    Route::get('/comment/delete/{id}', [App\Http\Controllers\Admin\CommentProductController::class, 'delete'])->name('comment.delete'); 
    Route::get('/comment/edit-status/{id}', [App\Http\Controllers\Admin\CommentProductController::class, 'editStatus'])->name('comment.editstatus'); 

    // Поиск 
    Route::post('/product/search', [App\Http\Controllers\Admin\ProductController::class, 'search'])->name('product.search'); 
    
    //Характеристики 
    Route::get('/charecter/create', [App\Http\Controllers\Admin\CharecterControler::class, 'createUpdate'])->name('charecter.create'); 
    Route::post('/charecter/create', [App\Http\Controllers\Admin\CharecterControler::class, 'createUpdate'])->name('charecter.create'); 

    Route::get('/charecter/update/{id}', [App\Http\Controllers\Admin\CharecterControler::class, 'createUpdate'])->name('charecter.update'); 
    Route::post('/charecter/update/{id}', [App\Http\Controllers\Admin\CharecterControler::class, 'createUpdate'])->name('charecter.update'); 

    Route::get('/charecter/all', [App\Http\Controllers\Admin\CharecterControler::class, 'all'])->name('charecter.all'); 
    Route::get('/charecter/delete/{id}', [App\Http\Controllers\Admin\CharecterControler::class, 'delete'])->name('charecter.delete'); 



    // Группы характеристик 
    Route::get('/charecter/group/create', [App\Http\Controllers\Admin\CharecterGroupController::class, 'createUpdate'])->name('charecter.group.create'); 
    Route::post('/charecter/group/create', [App\Http\Controllers\Admin\CharecterGroupController::class, 'createUpdate'])->name('charecter.group.create'); 

    Route::get('/charecter/group/update/{id}', [App\Http\Controllers\Admin\CharecterGroupController::class, 'createUpdate'])->name('charecter.group.update'); 
    Route::post('/charecter/group/update/{id}', [App\Http\Controllers\Admin\CharecterGroupController::class, 'createUpdate'])->name('charecter.group.update');

    Route::get('/charecter/group/all', [App\Http\Controllers\Admin\CharecterGroupController::class, 'all'])->name('charecter.group.all'); 
    Route::get('/charecter/group/delete/{id}', [App\Http\Controllers\Admin\CharecterGroupController::class, 'delete'])->name('charecter.group.delete'); 

    // Удаление характеристики у товара 
    Route::get('/charecter/product/delete/{id}', [App\Http\Controllers\Admin\CharecterProductController::class, 'delete'])->name('charecter.product.delete'); 
    

}); 


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    

