<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ContactController;
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
   Route::get('/delete/{id}',[CartController::class,'deleteProduct'])->name('cart.delProduct');
   Route::get('danh-sach',[CartController::class,'getListCart'])->name('cart.listCart');
});
Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function (){
   Route::get('thanh-toan',[CartController::class,'getPay'])->name('cart.pay');
   Route::post('thanh-toan',[CartController::class,'saveInfoShip']);
});
Route::group(['prefix'=>'lien-he'],function (){
    Route::get('/',[ContactController::class,'getContact'])->name('contact.get');
    Route::post('/',[ContactController::class,'saveContact']);
});
Route::group(['prefix'=>'ajax','middleware'=>'CheckLoginUser'],function (){
    Route::post('danh-gia/{id}',[RatingController::class,'saveRating'])->name('rating.product');
});
Route::post('thanh-toan',[RatingController::class,'saveInfoShip']);



