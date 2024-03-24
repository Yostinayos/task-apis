<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


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

route::get('/hi', function(){
    return "Hello World";
});

Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login');
       
    });
    Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::get('/', 'index');
        Route::get('/{$product}', 'show');
        
       
    });
    Route::prefix('categories')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::get('/', 'index');
        Route::get('/{$category}', 'show');
        
       
    });




Route::middleware(['auth:sanctum'])->group(function () {

   


    Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::post('/', 'store');
        Route::put('/{$product}', 'update');
        Route::delete('/{$product}', 'destroy');
       
    });
    Route::prefix('categories')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::post('', 'store');
        Route::put('/{$category}', 'update');
        Route::delete('/{$category}', 'destroy');
       
    });
    Route::prefix('images')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::post('', 'store');
        Route::put('/{$product}', 'update');
        Route::delete('/{$product}', 'destroy');
       
    });
});
