<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'authenticateUser'])->name('auth.authenticateUser');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');
});

Route::prefix('users')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
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

Route::prefix('positions')->group(function () {
    Route::get('/index', [PositionController::class, 'index'])->name('positions.index');
    Route::get('/show/{id}', [PositionController::class, 'show'])->name('positions.show');
    Route::get('/create', [PositionController::class, 'create'])->name('positions.create');
    Route::post('/store', [PositionController::class, 'store'])->name('positions.store');
    Route::put('/update/{id}', [PositionController::class, 'update'])->name('positions.update');
    Route::post('/edit/{id}', [PositionController::class, 'edit'])->name('positions.edit');
    Route::delete('/destroy/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');
});

Route::prefix('diplomas')->group(function () {
    Route::get('/index', [DiplomaController::class, 'index'])->name('diplomas.index');
    Route::get('/show/{id}', [DiplomaController::class, 'show'])->name('diplomas.show');
    Route::get('/create', [DiplomaController::class, 'create'])->name('diplomas.create');
    Route::post('/store', [DiplomaController::class, 'store'])->name('diplomas.store');
    Route::put('/update/{id}', [DiplomaController::class, 'update'])->name('diplomas.update');
    Route::post('/edit/{id}', [DiplomaController::class, 'edit'])->name('diplomas.edit');
    Route::delete('/destroy/{id}', [DiplomaController::class, 'destroy'])->name('diplomas.destroy');
});

Route::prefix('rewards')->group(function () {
    Route::get('/index', [RewardController::class, 'index'])->name('rewards.index');
    Route::get('/show/{id}', [RewardController::class, 'show'])->name('rewards.show');
    Route::get('/create', [RewardController::class, 'create'])->name('rewards.create');
    Route::post('/store', [RewardController::class, 'store'])->name('rewards.store');
    Route::put('/update/{id}', [RewardController::class, 'update'])->name('rewards.update');
    Route::post('/edit/{id}', [RewardController::class, 'edit'])->name('rewards.edit');
    Route::delete('/destroy/{id}', [RewardController::class, 'destroy'])->name('rewards.destroy');
});

Route::prefix('companies')->group(function () {
    Route::get('/index', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/show/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::put('/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::post('/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::delete('/destroy/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

Route::prefix('notifications')->group(function () {
    Route::get('/index', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/show/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::get('/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/leave', [NotificationController::class, 'requestLeave'])->name('notifications.leave');
    Route::post('/store', [NotificationController::class, 'store'])->name('notifications.store');
    Route::put('/update/{id}', [NotificationController::class, 'update'])->name('notifications.update');
    Route::post('/edit/{id}', [NotificationController::class, 'edit'])->name('notifications.edit');
    Route::delete('/destroy/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

Route::get('/organization', [OrganizationController::class, 'getPersonnelOrganization'])->name('organization.show');

Route::prefix('salaries')->group(function () {
    Route::get('/index', [SalaryController::class, 'index'])->name('salaries.index');
    Route::get('/show/{id}', [SalaryController::class, 'show'])->name('salaries.show');
    Route::get('/create', [SalaryController::class, 'create'])->name('salaries.create');
    Route::post('/store', [SalaryController::class, 'store'])->name('salaries.store');
    Route::put('/update/{id}', [SalaryController::class, 'update'])->name('salaries.update');
    Route::post('/edit/{id}', [SalaryController::class, 'edit'])->name('salaries.edit');
    Route::delete('/destroy/{id}', [SalaryController::class, 'destroy'])->name('salaries.destroy');
});