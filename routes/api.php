<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login');
       
    });
    Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::get('/', 'index');
        Route::get('/{product}', 'show');
        
       
    });
    Route::prefix('categories')
    ->controller(CategoryController::class)
    ->group(function () {
        
        Route::get('/', 'index');
        Route::get('/{category}', 'show');
        
       
    });




Route::middleware(['auth:sanctum'])->group(function () {

   


    Route::prefix('products')
    ->controller(ProductController::class)
    ->group(function () {
        
        Route::post('/', 'store');
        Route::put('/{product}', 'update');
        Route::delete('/{product}', 'destroy');
       
    });
    Route::prefix('categories')
    ->controller(CategoryController::class)
    ->group(function () {
        
        Route::post('/', 'store');
        Route::put('/{category}', 'update');
        Route::delete('/{category}', 'destroy');
       
    });
    Route::prefix('images')
    ->controller(ProductController::class)
    ->group(function () {
        route::get('/','index');
        Route::post('/', 'store');
        Route::put('/{product}', 'update');
        Route::delete('/{product}', 'destroy');
       
    });
});