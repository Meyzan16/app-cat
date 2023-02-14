<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\DashboardController;

//login
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// User
use App\Http\Controllers\User\UserDashboardController;


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


Route::get('/', [LoginController::class, 'index'] )->name('login');


Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'] )->name('admin.dashboard');
});

// login
Route::get('/register', [RegisterController::class, 'index'] )->name('register');

//User
Route::group([
    'prefix' => 'user/'], function(){
    Route::get('/dashboard', [UserDashboardController::class, 'index'] )->name('user.dashboard');
});


