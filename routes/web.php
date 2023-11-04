<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\ProductControllerApi;
use App\Http\Controllers\Api\CategoryControllerApi;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\OrderController;
use App\Models\Order;

use App\Http\Controllers\OrderDetailController;
use App\Models\OrderDetail;

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


Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/test', function () {
    $test = Order::find(1); 
    $test2 = $test->detail;
    return compact('test');
});


Route::get('/product', [ProductController::class , 'index']);
Route::post('/product/search', [ProductController::class , 'search']);
Route::get('/product/search', [ProductController::class , 'search']);
Route::get('/product/edit/{id?}' , [ProductController::class , 'edit']);
Route::post('/product/update' , [ProductController::class , 'update']);


Route::get('/category', [CategoryController::class , 'index']);
Route::post('/category/search', [CategoryController::class , 'search']);
Route::get('/category/search', [CategoryController::class , 'search']);
Route::get('/category/edit/{id?}' , [CategoryController::class , 'edit']);
Route::post('/category/update' , [CategoryController::class , 'update']);


Route::get('/product/insert' , [ProductController::class,'insert']);
Route::post('/product/insert' , [ProductController::class,'insert']);

Route::get('/product/remove/{id}' , [ProductController::class,'remove']);

Route::get('/category/remove/{id}' , [CategoryController::class,'remove']);


Route::get('/category/insert' , [CategoryController::class,'insert']);
Route::post('/category/insert' , [CategoryController::class,'insert']);


Route::get('/home', [HomeController::class, 'index']);

// Route::get('/api/product', [ProductControllerApi::class, 'product_list']);
// Route::get('/api/category', [CategoryControllerApi::class, 'category_list']);

// Route::get('/api/product/{category_id?}' , [ProductControllerApi::class, 'product_list']);

Route::get('/cart/view', [CartController::class, 'viewCart']);
Route::get('/cart/add/{id}', [CartController::class, 'addToCart']);

Route::get('/cart/delete/{id}', [CartController::class, 'deleteCart']);


Route::get('/cart/update/{id}/{qty}', [CartController::class, 'updateCart']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\Auth\logout::class , 'logout']);

Route::get('/cart/checkout', [CartController::class, 'checkout']);



// ของอันใหม่ Project //
Route::get('/cart/complete', [CartController::class, 'complete']);
Route::get('/cart/addtoorder', [CartController::class, 'addtoorder']);
Route::get('/order', [OrderController::class, 'index']);
Route::get('/cart/finish',[CartController::class, 'finish_order']);

//==========================================// User //==========================================//
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::post('/user/search', [UserController::class, 'search']);
Route::get('/user/edit/{id?}', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);
Route::post('/user/add', [UserController::class, 'insert']);
Route::get('/user/remove/{id}', [UserController::class, 'remove']);

Route::get('/orderdetail/{id}', [OrderDetailController::class, 'index']);
Route::get('/orderdetail/edit1/{id}', [OrderDetailController::class, 'editstatus1']);
Route::get('/orderdetail/edit2/{id}', [OrderDetailController::class, 'editstatus2']);