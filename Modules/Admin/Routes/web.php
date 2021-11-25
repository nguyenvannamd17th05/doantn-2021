<?php
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\AdminArticleController;
use Modules\Admin\Http\Controllers\OrderController;
use Modules\Admin\Http\Controllers\AdminUserController;
use Modules\Admin\Http\Controllers\SliderController;
use Modules\Admin\Http\Controllers\TransactionController;
use Modules\Admin\Http\Controllers\RatingController;
use Modules\Admin\Http\Controllers\ContactController;
use Modules\Admin\Http\Controllers\AdminController;
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
Route::group(['prefix' => 'auth'], function(){
    Route::get('/login',[AdminController::class,'getLogin'])->name('admin.login');
    Route::post('/login',[AdminController::class,'postLogin']);
});
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'category'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.cate.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.cate.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.cate.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/{action}/{id}', [CategoryController::class, 'action'])->name('admin.cate.action');
    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/update/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::get('/{action}/{id}', [ProductController::class, 'action'])->name('admin.product.action');
    });
    Route::group(['prefix' => 'article'], function(){
        Route::get('/', [AdminArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/create', [AdminArticleController::class, 'store']);
        Route::get('/update/{id}', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/update/{id}', [AdminArticleController::class, 'update']);
        Route::get('/{action}/{id}', [AdminArticleController::class, 'action'])->name('admin.article.action');
    });
    Route::group(['prefix' => 'order'], function(){
        Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
    });
    Route::group(['prefix' => 'transaction'], function(){
        Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
        Route::get('/view/{id}', [TransactionController::class, 'viewOrder'])->name('admin.transaction.view');
        Route::get('/active/{id}', [TransactionController::class, 'active'])->name('admin.transaction.active');
        Route::get('/{action}/{id}', [TransactionController::class, 'active'])->name('admin.transaction.action');
    });
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [AdminUserController::class, 'store']);
        Route::get('/update/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update']);
        Route::get('/{action}/{id}', [AdminUserController::class, 'action'])->name('admin.user.action');
    });
    Route::group(['prefix' => 'rating'], function() {
        Route::get('/', [RatingController::class, 'index'])->name('admin.rating.index');
    });
    Route::group(['prefix' => 'slider'], function(){
        Route::get('/', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/create', [SliderController::class, 'store']);
        Route::get('/update/{id}', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'update']);
        Route::get('/{action}/{id}', [SliderController::class, 'action'])->name('admin.user.action');
    });
    Route::group(['prefix' => 'contact'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/{action}/{id}',[ContactController::class,'action'])->name('admin.contact.action');
    });
});
