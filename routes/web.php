<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientProductController;
use App\Http\Controllers\Customer;
use App\Http\Controllers\LayoutAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CartController;
// use App\Http\Controllers\Api\CategoryApi;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('store/', [HomeController::class, 'store'])->name('store');
Route::get('/getProductsCategory/{ids?}', [ClientProductController::class, 'getProductsCategory'])->name('getProductsCategory');
Route::get('/getProductById/{id?}-{productName?}', [ClientProductController::class, 'getProductById'])->name('detailProduct');
Route::get('/products', [ClientProductController::class, 'showProductsPage'])->name('product');
Route::get('/searchTerm', [ClientProductController::class, 'findProduct'])->name('findProduct');

Route::prefix('users')->name('nguoidung.')->group(function () {
    Route::get('formLogin/', [HomeController::class, 'formLogin'])->name('formLogin');
    Route::get('formRegister/', [HomeController::class, 'formRegister'])->name('formRegister');
    Route::post('formRegister/', [Customer::class, 'addUser'])->name('addUsers');
    Route::post('formLogin/', [Customer::class, 'checkLogin'])->name('checkLogIn');
    Route::get('verifyMail/{customer?}', [Customer::class, 'verifyMail'])->name('verifyMail');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/dashboard', [LayoutAdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/widget', [LayoutAdminController::class, 'widget'])->name('admin.widget');
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('feedback', FeedbackController::class);
    // Route::resource('category', CategoryController::class)->only(['index', 'create', 'store', 'show']); // chỉ lấy ra nhưng action được liệt kê
    // Route::resource('category', CategoryController::class)->except(['edit', 'update', 'destroy']); // lấy ra các tất cả action ngoại trừ những action được liệt kê
});

Route::get('test-email', [HomeController::class, 'testEmail']);

Route::prefix('cart')->group(function () {
    Route::get('add/{product?}', [CartController::class, 'addToCart'])->name('add.cart');
    Route::get('delete/{id}', [CartController::class, 'deleteCart'])->name('delete.cart');
    Route::get('shoppingCart/', [CartController::class, 'shoppingCart'])->name('shoppingCart');
    Route::get('/update/{id}', [CartController::class, 'updateCart'])->name('updateCart');
});
