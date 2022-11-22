<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;



Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');

    Route::get('/google', [LoginController::class, 'google']);
    Route::get('/google/callback', [LoginController::class, 'handleGoogleCallback']);

    Route::get('/facebook', [LoginController::class, 'facebook']);
    Route::get('/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

    Route::get('/logout', [LoginController::class, 'logout']);
});



Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get('/create', [DashboardController::class, 'create']);
        Route::post('/store', [DashboardController::class, 'store']);
    });
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/fetch_latest_listings', [HomeController::class, 'fetch_latest_listings']);
Route::get('/product/search', [ProductController::class, 'search_product']);
Route::get('/category/{category_slug}', [ProductController::class, 'category_products']);
Route::get('/{category_slug}/{product_slug}', [ProductController::class, 'product_details']);
