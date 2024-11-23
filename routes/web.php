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

//Auth::routes();
Auth::routes(['register' => false]); // Nonaktifkan hanya register

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'data', 'middleware' => 'admin'], function () {
    Route::get('/form', [App\Http\Controllers\Front\LatihanController::class, 'index'])->name('latihan.index');
    Route::post('/form', [App\Http\Controllers\Front\LatihanController::class, 'store'])->name('latihan.store');
    Route::get('/form/detail/{id}', [App\Http\Controllers\Front\LatihanController::class, 'detail'])->name('latihan.detail');
    Route::put('/form/update/{id}', [App\Http\Controllers\Front\LatihanController::class, 'update'])->name('latihan.update');
    Route::delete('/form/hapus/{id}', [App\Http\Controllers\Front\LatihanController::class, 'destroy'])->name('latihan.destroy');
});
