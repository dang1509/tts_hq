<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Admin\UserController;
use App\Interfaces\Http\Controllers\Admin\Auth\RegisterController;
use App\Interfaces\Http\Controllers\Admin\Auth\LoginController;
use App\Interfaces\Http\Controllers\Admin\User\ProfileController;
use App\Interfaces\Http\Controllers\Admin\PermissionController;



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
Route::group(array('as' => 'admin.'),function(){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('login/gmail', [LoginController::class, 'loginGmail'])->name('login.gmail');
    Route::get('callback-login/gmail/{token}', [LoginController::class, 'callbackLoginGmail']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('auth')->group(function () {
        Route::get('/security-2fa/very',[ProfileController::class, 'getVery'])->name('security-2fa.very');
        Route::post('/security-2fa/very',[ProfileController::class, 'postVery']);
        Route::middleware('2fa')->group(function () {
            Route::get('/dashboard', function () {
                $page_title = 'Dashboard';
                $page_breadcrumbs = [
                    [
                        'page' => route('admin.dashboard'),
                        'title' => 'Home',
                    ],
                ];
                return view('admin.index',compact('page_title', 'page_breadcrumbs'));
            })->name('dashboard');
            Route::get('/', function () {
                $page_title = 'Dashboard';
                $page_breadcrumbs = [
                    [
                        'page' => route('admin.dashboard'),
                        'title' => 'Home',
                    ],
                ];
                return view('admin.index',compact('page_title', 'page_breadcrumbs'));
            });
            Route::get('/profile', [ProfileController::class, 'getProfile'])->name('profile');
            Route::post('/change-password', [ProfileController::class, 'postChangePassword'])->name('change-password');
            Route::post('/change-password2', [ProfileController::class, 'postChangePassword2'])->name('change-password2');
            Route::get('/security-2fa',[ProfileController::class, 'get_security_2fa'])->name('security-2fa.index');
            Route::get('/security-2fa/setup',[ProfileController::class, 'setup_google_2fa'])->name('security-2fa.setup');
            Route::post('/security-2fa/setup',[ProfileController::class, 'enable2fa']);
            Route::post('/security-2fa/disable2fa',[ProfileController::class, 'disable2fa'])->name('security-2fa.disable2fa');
            Route::get('/security-2fa/recovery-code',[ProfileController::class, 'getRecoveryCode'])->name('security-2fa.recovery-code');
            // Route::post('role/order', 'Admin\RoleController@order')->name('role.order');
            // Route::resource('role','Admin\RoleController');
            Route::post('permission/order', 'Admin\PermissionController@order')->name('permission.order');
            Route::resource('permission','Admin\PermissionController');
        });
    });
});
