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

Route::get('/landingpage/detail/succes', function () {
    return view('succes');
})->name('succes')->middleware('auth');

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

Route::get('/admin/kamar', [\App\Http\Controllers\AdminController::class, 'kamar'])->name('kamar')->middleware('admin');
Route::get('/admin/kamar', [\App\Http\Controllers\AdminController::class, 'kamar'])->name('admin.kamar')->middleware('admin');
Route::post('/admin/kamar', [\App\Http\Controllers\AdminController::class, 'submit_kamar'])->name('admin.kamar.submit')->middleware('admin');
Route::patch('admin/kamar/update', [\App\Http\Controllers\AdminController::class, 'update_kamar'])->name('admin.kamar.update')->middleware('admin');
Route::get('admin/ajaxadmin/dataKamar/{id}', [\App\Http\Controllers\AdminController::class, 'getDataKamar']);
Route::post('admin/kamar/update/{id}', [\App\Http\Controllers\AdminController::class, 'delete_kamar'])->name('admin.kamar.delete')->middleware('admin');
Route::post('admin/kamar/delete/{id}', [App\Http\Controllers\AdminController::class,'delete_kamar'])->name('admin.kamar.delete')->middleware('admin');


// Admin Reservation View

Route::get('/admin/reservasi', function () {
    return view('reservasi');
})->name('reservasi')->middleware('admin');

Route::get('/admin/reservasi', [\App\Http\Controllers\AdminController::class, 'reservasi'])->name('reservasi')->middleware('admin');
Route::get('/admin/reservasi', [\App\Http\Controllers\AdminController::class, 'reservasi'])->name('admin.reservasi')->middleware('admin');
Route::post('/admin/reservasi', [\App\Http\Controllers\AdminController::class, 'submit_reservasi'])->name('admin.reservasi.submit')->middleware('admin');
Route::post('landingpage/detail/succes', [\App\Http\Controllers\AdminController::class, 'submit_reservasi_user'])->name('user.reservasi.submit')->middleware('auth');
Route::patch('admin/reservasi/update', [\App\Http\Controllers\AdminController::class, 'update_reservasi'])->name('admin.reservasi.update')->middleware('admin');
Route::get('admin/ajaxadmin/datareservasi/{id}', [\App\Http\Controllers\AdminController::class, 'getDataReservasi']);
Route::post('admin/reservasi/update/{id}', [\App\Http\Controllers\AdminController::class, 'delete_reservasi'])->name('admin.reservasi.delete')->middleware('admin');
Route::post('admin/reservasi/delete/{id}', [App\Http\Controllers\AdminController::class,'delete_reservasi'])->name('admin.reservasi.delete')->middleware('admin');


// Admin Report View

Route::get('/admin/report', function () {
    return view('report');
})->name('report')->middleware('admin');

Route::get('/admin/report', [\App\Http\Controllers\AdminController::class, 'report'])->name('report')->middleware('admin');
Route::get('/admin/report', [\App\Http\Controllers\AdminController::class, 'report'])->name('admin.report')->middleware('admin');

// PDF Routes

Route::get('admin/print_users', [App\Http\Controllers\AdminController::class,'print_users'])->name('admin.print.users')->middleware('admin');
Route::get('admin/print_kamars', [App\Http\Controllers\AdminController::class,'print_kamars'])->name('admin.print.kamars')->middleware('admin');
Route::get('admin/print_reservasis', [App\Http\Controllers\AdminController::class,'print_reservasis'])->name('admin.print.reservasis')->middleware('admin');

// Export Excel

Route::get('admin/report/userexport', [App\Http\Controllers\AdminController::class,'userexport'])->name('admin.report.exportuser')->middleware('admin');
Route::get('admin/report/kamarexport', [App\Http\Controllers\AdminController::class,'kamarexport'])->name('admin.report.exportkamar')->middleware('admin');
Route::get('admin/report/reservasiexport', [App\Http\Controllers\AdminController::class,'reservasiexport'])->name('admin.report.exportreservasi')->middleware('admin');

// Import Export

Route::post('admin/report/userimport', [App\Http\Controllers\AdminController::class,'userimport'])->name('admin.report.importuser')->middleware('admin');
Route::post('admin/report/kamarimport', [App\Http\Controllers\AdminController::class,'kamarimport'])->name('admin.report.importkamar')->middleware('admin');
Route::post('admin/report/reservasiimport', [App\Http\Controllers\AdminController::class,'reservasiimport'])->name('admin.report.importreservasi')->middleware('admin');

// Mail

Route::get('/email', [\App\Http\Controllers\AdminController::class,'sentMail'])->name('email');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
