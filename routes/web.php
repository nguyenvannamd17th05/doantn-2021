<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;

use Illuminate\Http\Request;

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

Auth::routes();

Route::group(['namespace'=>'Auth'],function (){
    Route::get('/dang-ky',[RegisterController::class,'getRegister'])->name('get.register');
    Route::post('/dang-ky',[RegisterController::class,'postRegister'])->name('post.register');
    Route::get('/dang-nhap',[LoginController::class,'getLogin'])->name('get.login');
    Route::post('/dang-nhap',[LoginController::class,'postLogin'])->name('post.login');
    Route::get('/dang-xuat',[LoginController::class,'getLogout'])->name('get.logout');
});
Route::get('/',[HomeController::class,'index'])->name('home.index');


Route::get('/danh-muc/{slug}-{id}',[CategoryController::class,'listProduct'])->name('cate.listProduct');
Route::get('/san-pham/{slug}-{id}',[ProductController::class,'detailProduct'])->name('product.detail');

Route::group(['prefix'=>'shopping'],function(){
   Route::get('/add/{id}',[CartController::class,'addProduct'])->name('cart.addProduct');
   Route::get('danh-sach',[CartController::class,'getListCart'])->name('cart.listCart');
});


