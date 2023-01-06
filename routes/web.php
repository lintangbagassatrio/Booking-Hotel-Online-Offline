<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('landingpage');
});

Auth::routes();

// User View
Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage')->middleware('auth');
Route::get('/landingpage/detail', function() {
    return view('detail');
})->name('detail');

// CRUD Admin User

Route::get('/admin/user', [\App\Http\Controllers\AdminController::class, 'user'])->name('user')->middleware('admin');
Route::get('/admin/user', [\App\Http\Controllers\AdminController::class, 'user'])->name('admin.user')->middleware('admin');
Route::post('/admin/user', [\App\Http\Controllers\AdminController::class, 'submit_user'])->name('admin.user.submit')->middleware('admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
