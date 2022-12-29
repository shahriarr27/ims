<?php

use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\MemberShipController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LogoutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StoreSettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\LoginController;

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard.index');
    // single user routes
    Route::controller(UserController::class)->group(function () {
        Route::group(['prefix' => 'user'],function(){
            Route::get('/profile', 'profile')->name('user.profile');
            Route::get('profile/{id}/edit', 'edit')->name('user.profile.edit');
            Route::patch('profile/{id}/update', 'profileUpdate')->name('user.profile.update');
            Route::get('/{id}','show')->name('user.show');
        });
    });
});

Route::get('migrate', function () {
    Artisan::call('migrate');
    Artisan::call('db:seed');
});

Route::get('/verify_email/{id}', [AdminController::class, 'verifyMail'])->name('users.verify_mail');

Route::get('/', [LoginController::class, 'show'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [DashboardController::class,'index'])->name('dashboard.index');

    //user routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'users'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        //email verify
    });

    // Admins Routes
    Route::group(['prefix' => 'admins', 'middleware' => 'superadmin'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admins.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/create', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/{user}/show', [AdminController::class, 'show'])->name('admins.show');
        Route::get('/{user}/edit', [AdminController::class, 'edit'])->name('admins.edit');
        Route::patch('/{user}/update', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/{user}/delete', [AdminController::class, 'destroy'])->name('admins.destroy');

    });
    Route::get('settings', [StoreSettingController::class, 'index'])->name('appsettings');
    Route::post('settings/update', [StoreSettingController::class, 'store'])->name('settingsStore');
    Route::post('paypal/update', [StoreSettingController::class, 'envSettingStore'])->name('envSettingStore');


    //subscription routs
    Route::controller(SubscriptionController::class)->group(function () {
        Route::group(['prefix' => 'subscription'], function () {
            Route::get('/', 'index')->name('subscription');
            Route::get('/create', 'create')->name('subscription.create');
            Route::post('/store', 'store')->name('subscription.store');
            Route::get('/{id}/edit', 'edit')->name('subscription.edit');
            Route::put('/{id}', 'update')->name('subscription.update');
            Route::delete('/{id}', 'destroy')->name('subscription.destroy');
        });
    });

    //memberships routes

    Route::controller(MemberShipController::class)->group(function () {
        Route::group(['prefix' => 'membership'], function () {
            Route::get('/', 'index')->name('membership');
            Route::get('/create', 'create')->name('membership.create');
            Route::post('/store', 'store')->name('membership.store');
            Route::get('/{id}/edit', 'edit')->name('membership.edit');
            Route::put('/{id}', 'update')->name('membership.update');
            Route::delete('/{id}', 'destroy')->name('membership.destroy');
        });
    });


});
