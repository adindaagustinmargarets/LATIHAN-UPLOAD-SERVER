<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/latihan', [App\Http\Controllers\Backend\LatihanController::class, 'index'])->name('latihan.index')->middleware('auth');
Route::post('/latihan', [App\Http\Controllers\Backend\LatihanController::class, 'tambah'])->name('latihan.tambah');
Route::post('/latihan-auth', [App\Http\Controllers\Backend\LatihanController::class, 'tambahauth'])->name('latihan.tambah-auth');
Route::delete('latihan/hapus/{id}', [App\Http\Controllers\Backend\LatihanController::class, 'hapus'])->name('latihan.hapus');
