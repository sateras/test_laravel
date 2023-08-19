<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'v1'], function () {

    Route::group(['controller' => AuthController::class], function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout')->middleware('auth:sanctum');
    });

    Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);

    Route::group(['controller' => ProductController::class], function () {
        Route::get('/products', 'index');
        Route::post('/products', 'store');
        Route::get('/products/{product:slug}', 'showBySlug');
        Route::post('/products/{id}/attributes', 'addAttribute');
    });
    
    Route::group(['middleware' => ['auth:sanctum']], function() {

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::group(['controller' => CartController::class], function () {
            Route::get('/cart', 'index');
            Route::post('/cart', 'store');
            Route::put('/cart/{id}', 'update');
            Route::delete('/cart/{id}', 'destroy');
        });

        Route::group(['controller' => OrderController::class], function () {
            Route::get('/orders', 'index');
            Route::post('/orders', 'createOrder');
        });
    });
});