<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'controller' => IndexController::class,
    'as' => 'page.'
], function () {
    Route::get('/', 'home')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    // Страница с продуктами
    Route::get('/products', 'allProducts')->name('allProducts');
});

Route::group([
    'controller' => ProductController::class,
    'as' => 'product.',
    'prefix' => '/product'
], function () {
    Route::group([
        'middleware' => ['auth', AdminMiddleware::class],
    ], function () {
        Route::post('/create', 'store')->name('store');
    });

    Route::get('/{id}/addToCart', 'addToCart')->name('addToCart')->where('id', '[0-9]*');
});

Route::group([
    'controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'
], function () {
    Route::post('/create', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logout', 'logoutUser')->name('logoutUser');
});


Route::group([
    'controller' => CartController::class,
    'as' => 'cart.',
    'prefix' => '/cart'
], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create', 'createOrder')->middleware('auth')->name('createOrder');

    Route::get('/{product:id}/remove', 'remove')->name('remove');
});

Route::group([
    'controller' => \App\Http\Controllers\AdminController::class,
    'as' => 'admin.',
    'prefix' => '/admin',
    'middleware' => ['auth', AdminMiddleware::class]
], function () {
    Route::get('/', 'index')->name('index');

    Route::get('/product/create', 'createProduct')->name('createProduct');
});


Route::group([
    'controller' => \App\Http\Controllers\OrderController::class,
    'as' => 'order.',
    'prefix' => '/order',
    'middleware' => ['auth', AdminMiddleware::class]
], function () {
    Route::get('/toggle/{order:id}', 'toggleOrderStatus')->name('toggle');
});

