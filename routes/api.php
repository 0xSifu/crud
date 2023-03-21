<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\categoryController;
use App\Http\Controllers\api\imageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Product
Route::get('products', [productController::class, 'index']);
Route::get('product/{id}', [productController::class, 'show']);
Route::post('product', [productController::class, 'store']);
Route::put('product/{id}', [productController::class, 'update']);
Route::delete('product/{id}', [productController::class, 'destroy']);

//Category
Route::get('categories', [categoryController::class, 'index']);
Route::get('category/{id}', [categoryController::class, 'show']);
Route::post('category', [categoryController::class, 'store']);
Route::put('category/{id}', [categoryController::class, 'update']);
Route::delete('category/{id}', [categoryController::class, 'destroy']);

//Image
Route::get('images', [imageController::class, 'index']);
Route::get('image/{id}', [imageController::class, 'show']);
Route::post('image', [imageController::class, 'store']);
Route::post('image/{id}', [imageController::class, 'update']);
Route::delete('image/{id}', [imageController::class, 'destroy']);

//Pivot Product Category
Route::get('product_category', [productController::class, 'product_category']);

//Pivot Product Image
Route::get('product_image', [productController::class, 'product_image']);



