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
Route::get('/latihan', [App\Http\Controllers\LatihanController::class, 'index'])->name('latihan.index');
Route::post('/latihan', [App\Http\Controllers\LatihanController::class, 'tambah'])->name('latihan.tambah');
Route::delete('/latihan/hapus/{id}', [App\Http\Controllers\LatihanController::class, 'hapus'])->name('latihan.hapus');
Route::get('/list-cronjob', [App\Http\Controllers\LatihanController::class, 'cronjob']);

Route::get('/riwayat', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
Route::post('/payment', [App\Http\Controllers\PaymentController::class, 'bayar'])->name('payments.bayar');
Route::get('/payment/cetak/{id}', [App\Http\Controllers\PaymentController::class, 'cetak'])->name('payments.cetak-pdf');
Route::get('/payments/detail/{payment}', [App\Http\Controllers\PaymentController::class, 'detail'])->name('payments.detail');
Route::delete('/payments/hapus/{id}', [App\Http\Controllers\PaymentController::class, 'delete'])->name('payments.delete');
Route::post('/payment/callback', [App\Http\Controllers\PaymentController::class, 'paymentCallback'])->name('payments.callback');
