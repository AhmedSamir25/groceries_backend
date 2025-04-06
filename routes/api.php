<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NutritionsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/auth/send-reset-otp', [AuthController::class, 'sendResetOTP']);

Route::post('/auth/verify-reset-otp', [AuthController::class, 'verifyResetOTP']);

Route::post('/banner/add-banner-image', [BannerController::class, 'addBanner']);

Route::get('/banner/banner-image', [BannerController::class, 'getBanners']);

Route::delete('/banner/delete-banner-image/{id}', [BannerController::class, 'deleteBanner']);

Route::post('/products/add-product', [ProductController::class, 'addProduct']);

Route::get('/products/products-offer', [ProductController::class, 'getOfferProducts']);

Route::get('/products/products-bestSelling', [ProductController::class, 'getBestSalesProducts']);

Route::put('/products/products-update', [ProductController::class, 'updateProduct']);

Route::delete('/products/products-delete/{id}', [ProductController::class, 'deleteProduct']);

Route::post('/category/categories-add', [CategoryController::class,'addCategory']);

Route::get('/category/categories', [CategoryController::class,'getAllCategories']);

Route::post('/brand/brands-add', [BrandController::class,'addBrand']);

Route::post('/nutritions/nutritions-add', [NutritionsController::class,'addProductNutritions']);

Route::get('/nutritions/nutritions-product/{id}', [NutritionsController::class,'getAllNutritions']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);

Route::post('/cart/add', [CartController::class, 'store']);
Route::delete('/cart/remove/{id}', [CartController::class, 'destroy']); 
Route::get('/cart', [CartController::class, 'index']);

Route::post('/favorites/add', [FavoriteController::class, 'store']); 
Route::delete('/favorites/remove/{id}', [FavoriteController::class, 'destroy']); 
Route::get('/favorites', [FavoriteController::class, 'index']);

