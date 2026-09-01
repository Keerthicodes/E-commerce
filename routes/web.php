<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryContorller;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'seller'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::delete('/products/{id}', [ProductController::class, 'destory']);
    Route::get('/category-test', [ProductController::class, 'categoryTest']);
    Route::get('/seller/products', [ProductController::class, 'sellerProducts']);

    //categories 
    Route::get('/categories', [CategoryContorller::class, 'index']);
    Route::get('/categories/create', [CategoryContorller::class, 'create']);
    Route::post('/categories', [CategoryContorller::class, 'store']);
});

Route::middleware('auth')->group(function () {

    //products
    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/products/{id}', [ProductController::class, 'show']);


    //cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{id}', [CartController::class, 'add']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);

    //order
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/checkout', [OrderController::class, 'checkout']);
    Route::get('/order/{id}', [OrderController::class, 'show']);
});

//auth
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']);
