<?php

use App\Interfaces\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Interfaces\Http\Controllers\User\Auth\LoginController;
use App\Interfaces\Http\Controllers\User\Auth\RegisterController;
use App\Interfaces\Http\Controllers\User\Auth\ResetPasswordController;
use App\Interfaces\Http\Controllers\User\Auth\VerifyOtpController;
use App\Interfaces\Http\Controllers\User\Auth\VerifyOtpLoginController;
use App\Interfaces\Http\Controllers\User\User\ProfileController;
use App\Interfaces\Http\Controllers\Auth\OtpController;
use App\Interfaces\Http\Controllers\User\Auth\LoginController as AuthLoginController;
use App\Interfaces\Http\Controllers\User\Auth\VerifyAccountController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->as('user.')->group(function (){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('login/gmail', [LoginController::class, 'loginGmail'])->name('login.gmail');
    Route::get('callback-login/gmail/{token}', [LoginController::class, 'callbackLoginGmail']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/otp/verify', [VerifyOtpController::class, 'showOtpForm'])->name('otp.verify.form');
    Route::post('/otp/verify', [VerifyOtpController::class, 'verifyOtp'])->name('otp.verify');


    Route::get('/send-verify-mail', [ForgotPasswordController::class, 'send'])->name('email.send');
    Route::get('/verify-email/{token}', [ForgotPasswordController::class, 'verify'])->name('email.verify');
    
    
    Route::get('/verify-account/{token}', [VerifyAccountController::class, 'verify'])->name('verify.account');


    Route::get('/forgot-password',[ForgotPasswordController::class,'showFormForgot'])->name('forgot.password.form');
    Route::post('/forgot-password',[ForgotPasswordController::class,'checkForm'])->name('forgot.password.check');
    // Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('reset.password.form');


    Route::get('/', function () {
        return redirect()->route('user.login');
    })->name('home');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['auth','verified.email'])->group(function () {
        // Route::get('/security-2fa/very',[ProfileController::class, 'getVery'])->name('security-2fa.very');
        // Route::post('/security-2fa/very',[ProfileController::class, 'postVery']);
        return view('user.profile.index');
        
    });

});








