<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

// Admin Route.............................
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [AdminController::class, 'login'])->name('login');

    Route::middleware('admin.auth')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

        Route::patch('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::put('password', [ProfileController::class, 'passwordUpdate'])->name('password.update');

        Route::get('setting', [SettingController::class, 'setting'])->name('setting');
        Route::patch('default/setting/update/{id}', [SettingController::class, 'defaultSettingUpdate'])->name('default.setting.update');
        Route::patch('mail/setting/update/{id}', [SettingController::class, 'mailSettingUpdate'])->name('mail.setting.update');

    });
});

// Frontend Route.............................
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::patch('/profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::put('password', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});


require __DIR__.'/auth.php';
