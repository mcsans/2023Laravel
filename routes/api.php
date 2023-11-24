<?php

use App\Http\Controllers\API\CategoryProductController;
use App\Http\Controllers\api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('master-data')->group(function () {

    /**
     * Master Data - Caregory Product API Routes
     * prefix: api/master-data/category-product
     */
    Route::prefix('category-product')->group(function () {
        Route::get('/', [CategoryProductController::class, 'index'])->name('api.category-product.index');
        Route::post('/', [CategoryProductController::class, 'store'])->name('api.category-product.store');

        Route::get('/{id}', [CategoryProductController::class, 'show'])->name('api.category-product.show');
        Route::put('/{id}', [CategoryProductController::class, 'update'])->name('api.category-product.update');
    });

    /**
     * Master Data - Product API Routes
     * prefix: api/master-data/product
     */
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('api.product.index');
        Route::post('/', [ProductController::class, 'store'])->name('api.product.store');

        Route::get('/{id}', [ProductController::class, 'show'])->name('api.product.show');
        Route::put('/{id}', [ProductController::class, 'update'])->name('api.product.update');
    });
});
