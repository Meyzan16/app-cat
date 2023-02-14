<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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


//TTD persetujuan
Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('admin.dashboard');
});

// login
Route::get('/register', [RegisterController::class, 'index'] )->name('register');


