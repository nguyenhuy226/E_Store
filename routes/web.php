<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MyAccountController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product-detail/{id}', [ProductController::class, 'detail'])->name('product-detail');
Route::get('/products/wishlist', [ProductController::class, 'wishlist'])->name('wishlist');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addItem'])->name('add-to-cart');
Route::get('/emtycart', [CartController::class, 'emty'])->name('emty-cart');
Route::put('/update-cart', [CartController::class, 'update'])->name('upadte-cart');
Route::get('/apply-code-cart', [CartController::class, 'applyCode'])->name('aplly-code-cart');
Route::get('/checkout', [CartController::class, 'order'])->name('checkout');
Route::post('/checkout', [CartController::class, 'orderPost'])->name('orderPost');
Route::get('completed', [CartController::class, 'completed'])->name('completed');

Route::get('/delete-item-cart/{id}', [CartController::class, 'deleteItem'])->name('delete-item-cart');
Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
