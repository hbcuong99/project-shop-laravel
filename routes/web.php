<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ShopMainController;
use App\Http\Controllers\ShopMenuController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CartAdminController;


Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function (){

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('main');
        Route::get('main', [MainController::class, 'index']);

        //Menus
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index'])->name('list');
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
        });

        //Posts
        Route::prefix('posts')->group(function(){
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::DELETE('destroy', [PostController::class, 'destroy']);
            Route::get('edit/{post}', [PostController::class, 'show']);
            Route::post('edit/{post}', [PostController::class, 'update']);
        });

        //Products
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });

        //Upload
        Route::post('upload/services', [UploadController::class, 'store']);

        //Cart
        Route::get('customers', [CartAdminController::class, 'index']);
        Route::get('customers/view/{customer}', [CartAdminController::class, 'show']);

        //Sliders
        Route::prefix('sliders')->group(function(){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
        });
    });
});

Route::get('/', [ShopMainController::class, 'index']);
Route::post('/services/load-product', [ShopMainController::class, 'loadProduct']);
Route::get('category/{id}-{slug}.html', [ShopMenuController::class, 'index']);
Route::get('product/{id}-{slug}.html', [ShopProductController::class, 'index']);
Route::post('/add-cart', [CartController::class, 'index'] );
Route::get('carts', [CartController::class, 'show'] );
Route::post('update-cart', [CartController::class, 'update'] );
Route::get('carts/delete/{id}', [CartController::class, 'remove'] );
Route::post('carts', [CartController::class, 'addCart'] );






