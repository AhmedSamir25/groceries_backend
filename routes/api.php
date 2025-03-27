
<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
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
