<?php

use GuzzleHttp\Middleware;
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

Route::group(['prefix' => 'backend', 'middleware' => ['auth']], function () {
    //example data
    Route::get('/example-data', [App\Http\Controllers\Backend\ExampleDataController::class, 'index'])->name('example-data.index');
    Route::post('/example-data', [App\Http\Controllers\Backend\ExampleDataController::class, 'tambah'])->name('example-data.tambah');
    Route::put('/example-data/edit/{id}', [App\Http\Controllers\Backend\ExampleDataController::class, 'edit'])->name('example-data.edit');
    Route::delete('/example-data/hapus/{id}', [App\Http\Controllers\Backend\ExampleDataController::class, 'hapus'])->name('example-data.hapus');
    Route::post('/example/reset', [App\Http\Controllers\Backend\ExampleDataController::class, 'reset'])->name('example-data.reset');
});
Route::get('/example-data/data', [App\Http\Controllers\Backend\ExampleDataController::class, 'detail']);
