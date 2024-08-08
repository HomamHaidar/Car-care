<?php

use App\Http\Controllers\API\Car\CarController;
use App\Http\Controllers\API\Offer\OfferController;
use App\Http\Controllers\API\Order\OrderController;
use App\Http\Controllers\API\Record\RecordController;
use App\Http\Controllers\Api\Service\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\VerifyOtpLogin;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\VerifyOtpRegister;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\ForgetPasswordController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'loginWithEmail']);
Route::post('login_phone', [LoginController::class, 'loginWithPhone']);
Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::post('verify_otp_login', [VerifyOtpLogin::class, 'verifyOtp']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('verify_otp_register', [VerifyOtpRegister::class, 'verifyOtp']);
    Route::post('verify-otp', [VerifyOtp::class, 'verifyOtp']);
    Route::apiResource('car', CarController::class);

    Route::apiResource('offer', offerController::class);
    Route::get('get_valid_offer',[offerController::class,'get_valid_offer']);

    Route::get('services/search', [ServiceController::class, 'search']);
    Route::get('services', [ServiceController::class, 'index']);

    Route::apiResource('order', OrderController::class);
});


