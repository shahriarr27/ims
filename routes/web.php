<?php

use App\Http\Controllers\Backend\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Frontend\UserDashboardController;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    return redirect()->back();
})->name('clear');

/**
 * Home Routes
 */

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register',  [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->middleware('checkstatus')->name('login.perform');
});

Route::get('reset', [UsersController::class, 'reset'])->name('resetbyemail');
Route::post('reset', [UsersController::class, 'resetMailSend'])->name('resetMailSend');
Route::get('password_reset/{token}', [UsersController::class, 'resetPassword'])->name('password_reset');
Route::post('password_reset', [UsersController::class, 'changePassword'])->name('changePassword');