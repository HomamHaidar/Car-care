<?php

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
});