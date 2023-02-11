<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\DashboardController;

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
    return view('Admin.main.dashboard');
});


//TTD persetujuan
Route::group([
    'prefix' => 'admin/'], function(){
    Route::get('/', [DashboardController::class, 'index'] )->name('admin.dashboard');
});

// login
Route::get('/login', [LoginController::class, 'index'] )->name('login');
Route::get('/login', [LoginController::class, 'index'] )->name('login');
Route::POST('/authentication', [LoginController::class, 'authentication'] )->name('authentication-admin');
Route::POST('/logout', [LoginController::class, 'logout'] )->name('logout-auth');

