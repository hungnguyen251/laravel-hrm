<?php

use App\Http\Controllers\DepartmentController;
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

Route::get('/', function () {
    return view('client_layout');
});

Route::prefix('staffs')->group(function () {
    Route::get('/index', [StaffController::class, 'index'])->name('staffs.index');
    Route::get('/show/{id}', [StaffController::class, 'show'])->name('staffs.show');
    Route::get('/create', [StaffController::class, 'create'])->name('staffs.create');
    Route::post('/store', [StaffController::class, 'store'])->name('staffs.store');
    Route::put('/update/{id}', [StaffController::class, 'update'])->name('staffs.update');
    Route::post('/edit/{id}', [StaffController::class, 'edit'])->name('staffs.edit');
    Route::delete('/destroy/{id}', [StaffController::class, 'destroy'])->name('staffs.destroy');
});

Route::prefix('departments')->group(function () {
    Route::get('/index', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::post('/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
});

