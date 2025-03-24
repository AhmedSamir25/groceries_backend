
<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'createUser']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/auth/send-reset-otp', [AuthController::class, 'sendResetOTP']);

Route::post('/auth/verify-reset-otp', [AuthController::class, 'verifyResetOTP']);
