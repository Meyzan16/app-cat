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




Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'] )->name('admin.dashboard');
});

// register
Route::get('/register', [RegisterController::class, 'index'] )->name('register');
Route::POST('/create-akun', [RegisterController::class, 'create'] )->name('register-post');
Route::get('{token}/aktivasi-token', [LoginController::class, 'aktivasi'] )->name('aktivasi.token');

//login
Route::get('/', [LoginController::class, 'index'] )->name('login');
Route::get('/auth/redirect', [LoginController::class, 'googleRedirect'] )->name('google.redirect');
Route::get('/google/redirect', [LoginController::class, 'googleCallback'] )->name('google.callback');
Route::POST('/authentifikasi', [LoginController::class, 'authenticate'] )->name('login.authenticate');
Route::post('/logout-user', [LoginController::class, 'logout'])->name('logout.user');

//User
Route::group([
    'prefix' => 'user/'], function(){
    Route::get('/dashboard', [UserDashboardController::class, 'index'] )->name('user.dashboard')->middleware('auth');
});


