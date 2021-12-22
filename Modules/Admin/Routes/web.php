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
use Modules\Admin\Http\Controllers\RoleController;
use Modules\Admin\Http\Controllers\PermissionController;

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
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
});
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/info',[AdminController::class,'info'])->name('admin.info');
    Route::group(['prefix' => 'category','middleware' =>'can:category'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.cate.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.cate.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.cate.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/{action}/{id}', [CategoryController::class, 'action'])->name('admin.cate.action');
    });
    Route::group(['prefix' => 'product','middleware' =>'can:product'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/update/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::get('/{action}/{id}', [ProductController::class, 'action'])->name('admin.product.action');
    });
    Route::group(['prefix' => 'article','middleware' =>'can:article'], function(){
        Route::get('/', [AdminArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/create', [AdminArticleController::class, 'store']);
        Route::get('/update/{id}', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/update/{id}', [AdminArticleController::class, 'update']);
        Route::get('/{action}/{id}', [AdminArticleController::class, 'action'])->name('admin.article.action');
    });

    Route::group(['prefix' => 'transaction','middleware' =>'can:transaction'], function(){
        Route::get('/', [TransactionController::class, 'index'])->name('admin.transaction.index');
        Route::get('/view/{id}', [TransactionController::class, 'viewOrder'])->name('admin.transaction.view');
        Route::get('/active/{id}', [TransactionController::class, 'active'])->name('admin.transaction.active');
        Route::get('/delete/{id}', [TransactionController::class, 'delete'])->name('admin.transaction.delete');
    });
    Route::group(['prefix' => 'user','middleware' =>'can:user'], function(){
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/{action}/{id}', [AdminUserController::class, 'action'])->name('admin.user.action');
    });
    Route::group(['prefix' => 'rating','middleware' =>'can:rating'], function() {
        Route::get('/', [RatingController::class, 'index'])->name('admin.rating.index');
    });

    Route::group(['prefix' => 'contact','middleware' =>'can:contact'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/{action}/{id}',[ContactController::class,'action'])->name('admin.contact.action');
    });
    Route::group(['prefix'=>'employee','middleware' =>'can:employee'],function (){
        Route::get('/',[RoleController::class,'index'])->name('admin.employee.index');
        Route::get('/create', [RoleController::class, 'create'])->name('admin.employee.create');
        Route::post('/create', [RoleController::class, 'store']);
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('admin.employee.edit');
        Route::post('/edit/{id}',[RoleController::class,'update']);
        Route::get('/{action}/{id}',[RoleController::class,'action'])->name('admin.employee.action');
    });
    Route::group(['prefix'=>'permission','middleware' =>'can:permission'],function (){
        Route::get('/',[PermissionController::class,'index'])->name('admin.role.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('admin.role.create');
        Route::post('/create', [PermissionController::class, 'store']);
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('admin.role.edit');
        Route::post('/edit/{id}',[PermissionController::class,'update']);
        Route::get('/delete/{id}',[PermissionController::class,'delete'])->name('admin.role.delete');
    });
});
