<?php

use App\Http\Controllers\StaffController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::prefix('staff')->group(function () {
    Route::get('/index', [StaffController::class, 'index'])->name('index');
    Route::get('/show/{id}', [StaffController::class, 'show'])->name('show');
    Route::post('/store', [StaffController::class, 'store'])->name('create');
    Route::put('/update/{id}', [StaffController::class, 'update'])->name('edit');
    Route::delete('/destroy/{id}', [StaffController::class, 'destroy'])->name('delete');
});
