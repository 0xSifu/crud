<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\productController;
use App\Http\Controllers\api\categoryController;

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

