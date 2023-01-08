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

// Admin User View
Route::get('/admin', function () {
    return view('home');
})->name('home')->middleware('admin');

Route::get('/admin/user', function () {
    return view('user');
})->name('user')->middleware('admin');

Route::get('/admin/user', [\App\Http\Controllers\AdminController::class, 'user'])->name('user')->middleware('admin');
Route::get('/admin/user', [\App\Http\Controllers\AdminController::class, 'user'])->name('admin.user')->middleware('admin');
Route::post('/admin/user', [\App\Http\Controllers\AdminController::class, 'submit_user'])->name('admin.user.submit')->middleware('admin');
Route::patch('admin/user/update', [\App\Http\Controllers\AdminController::class, 'update_user'])->name('admin.user.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataUser/{id}', [\App\Http\Controllers\AdminController::class, 'getDataUser']);
Route::post('admin/user/update/{id}', [\App\Http\Controllers\AdminController::class, 'delete_user'])->name('admin.user.delete')->middleware('admin');
Route::post('admin/user/delete/{id}', [App\Http\Controllers\AdminController::class,'delete_user'])->name('admin.user.delete')->middleware('admin');

// Admin Kamar View

Route::get('/admin/kamar', function () {
    return view('kamar');
})->name('kamar')->middleware('admin');

// Admin Reservation View

Route::get('/admin/reservasi', function () {
    return view('reservasi');
})->name('reservasi')->middleware('admin');

// Admin Report View

Route::get('/admin/report', function () {
    return view('report');
})->name('report')->middleware('admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
