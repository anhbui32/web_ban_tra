<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\ClientProductController;
use App\Http\Controllers\LayoutAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
|
| API không lưu session ví dụ trong bài này thì session là cart.
|
| Bảo mật API dùng json web token JWT.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// lấy-xuất dữ liệu của category bằng API
Route::get('/categoryApi', [CategoryApiController::class, 'getCategoryApi'])->name('category');

// lấy-xuất dữ liệu của product bằng API
Route::get('/productsApi', [ProductApiController::class, 'getProductApi'])->name('products');

//Thử nhiệm xuất dữ liệu API
Route::get('/getCategoryApiData', [CategoryApiController::class, 'getCategoryApiData'])->name('getCategoryApiData');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::resource('category', ApiCategoryController::class);
    Route::resource('products', ProductController::class);
});
