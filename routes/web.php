<?php

use App\Http\Controllers\AnnualLeaveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TimesheetsController;
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

Route::middleware(['auth:super_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'store'])->name('auth.authenticateUser');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
});

Route::prefix('users')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::post('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
    });
});

Route::prefix('staffs')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [StaffController::class, 'destroy'])->name('staffs.destroy');
    });

    Route::middleware(['auth:admin,accountant'])->group(function () {
        Route::get('/index', [StaffController::class, 'index'])->name('staffs.index');
        Route::get('/create', [StaffController::class, 'create'])->name('staffs.create');
        Route::post('/store', [StaffController::class, 'store'])->name('staffs.store');
        Route::put('/update/{id}', [StaffController::class, 'update'])->name('staffs.update');
        Route::post('/edit/{id}', [StaffController::class, 'edit'])->name('staffs.edit');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [StaffController::class, 'show'])->name('staffs.show');
    });
});

Route::prefix('departments')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::get('/show/{id}', [DepartmentController::class, 'show'])->name('departments.show');
        Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::post('/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/index', [DepartmentController::class, 'index'])->name('departments.index');
    });
});

Route::prefix('positions')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::get('/show/{id}', [PositionController::class, 'show'])->name('positions.show');
        Route::get('/create', [PositionController::class, 'create'])->name('positions.create');
        Route::post('/store', [PositionController::class, 'store'])->name('positions.store');
        Route::put('/update/{id}', [PositionController::class, 'update'])->name('positions.update');
        Route::post('/edit/{id}', [PositionController::class, 'edit'])->name('positions.edit');
        Route::delete('/destroy/{id}', [PositionController::class, 'destroy'])->name('positions.destroy');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/index', [PositionController::class, 'index'])->name('positions.index');
    });
});

Route::prefix('diplomas')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [DiplomaController::class, 'destroy'])->name('diplomas.destroy');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/show/{id}', [DiplomaController::class, 'show'])->name('diplomas.show');
        Route::get('/create', [DiplomaController::class, 'create'])->name('diplomas.create');
        Route::post('/store', [DiplomaController::class, 'store'])->name('diplomas.store');
        Route::put('/update/{id}', [DiplomaController::class, 'update'])->name('diplomas.update');
        Route::post('/edit/{id}', [DiplomaController::class, 'edit'])->name('diplomas.edit');
    });
    
    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/index', [DiplomaController::class, 'index'])->name('diplomas.index');
    });
});

Route::prefix('rewards')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [RewardController::class, 'destroy'])->name('rewards.destroy');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/show/{id}', [RewardController::class, 'show'])->name('rewards.show');
        Route::get('/create', [RewardController::class, 'create'])->name('rewards.create');
        Route::post('/store', [RewardController::class, 'store'])->name('rewards.store');
        Route::put('/update/{id}', [RewardController::class, 'update'])->name('rewards.update');
        Route::post('/edit/{id}', [RewardController::class, 'edit'])->name('rewards.edit');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/index', [RewardController::class, 'index'])->name('rewards.index');
    });
});

Route::prefix('companies')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
        Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/show/{id}', [CompanyController::class, 'show'])->name('companies.show');
        Route::put('/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
        Route::post('/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/index', [CompanyController::class, 'index'])->name('companies.index');
    });
});

Route::prefix('notifications')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/index', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('/approve/{id}', [NotificationController::class, 'changeApproveStatus'])->name('notifications.changeApproveStatus');
        Route::put('/update/{id}', [NotificationController::class, 'update'])->name('notifications.update');
        Route::post('/edit/{id}', [NotificationController::class, 'edit'])->name('notifications.edit');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [NotificationController::class, 'show'])->name('notifications.show');
        Route::get('/create', [NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/leave', [NotificationController::class, 'requestLeave'])->name('notifications.leave');
        Route::post('/store', [NotificationController::class, 'store'])->name('notifications.store');
    });
});

Route::middleware(['auth:admin,staff,accountant'])->group(function () {
    Route::get('/organization', [OrganizationController::class, 'getPersonnelOrganization'])->name('organization.show');
});

Route::prefix('salaries')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [SalaryController::class, 'destroy'])->name('salaries.destroy');
    });

    Route::middleware(['auth:accountant,admin'])->group(function () {
        Route::get('/index', [SalaryController::class, 'index'])->name('salaries.index');
    });

    Route::middleware(['auth:accountant'])->group(function () {
        Route::get('/create', [SalaryController::class, 'create'])->name('salaries.create');
        Route::post('/store', [SalaryController::class, 'store'])->name('salaries.store');
        Route::put('/update/{id}', [SalaryController::class, 'update'])->name('salaries.update');
        Route::post('/edit/{id}', [SalaryController::class, 'edit'])->name('salaries.edit');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [SalaryController::class, 'show'])->name('salaries.show');
    });
});

Route::prefix('timesheets')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::delete('/destroy/{id}', [TimesheetsController::class, 'destroy'])->name('timesheets.destroy');
    });

    Route::middleware(['auth:accountant'])->group(function () {
        Route::get('/index', [TimesheetsController::class, 'index'])->name('timesheets.index');
        Route::get('/create', [TimesheetsController::class, 'create'])->name('timesheets.create');
        Route::get('/month_selection', [TimesheetsController::class, 'monthSelection'])->name('timesheets.monthSelection');
        Route::post('/automatic', [TimesheetsController::class, 'automaticSalary'])->name('timesheets.automatic');
        Route::post('/store', [TimesheetsController::class, 'store'])->name('timesheets.store');
        Route::put('/update/{id}', [TimesheetsController::class, 'update'])->name('timesheets.update');
        Route::post('/edit/{id}', [TimesheetsController::class, 'edit'])->name('timesheets.edit');
        Route::get('/manual/{id}', [TimesheetsController::class, 'manualView'])->name('timesheets.manualView');
        Route::post('/manual', [TimesheetsController::class, 'manualSalaryCalculation'])->name('timesheets.manualSalaryCalculation');
        Route::get('/payroll-confirmation', [TimesheetsController::class, 'payrollConfirmation'])->name('timesheets.payrollConfirmation');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [TimesheetsController::class, 'show'])->name('timesheets.show');
    });
});

Route::prefix('leave')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::get('/create', [AnnualLeaveController::class, 'create'])->name('leave.create');
        Route::post('/store', [AnnualLeaveController::class, 'store'])->name('leave.store');
        Route::put('/update/{id}', [AnnualLeaveController::class, 'update'])->name('leave.update');
        Route::post('/edit/{id}', [AnnualLeaveController::class, 'edit'])->name('leave.edit');
        Route::delete('/destroy/{id}', [AnnualLeaveController::class, 'destroy'])->name('leave.destroy');
    });

    Route::middleware(['auth:admin,accountant'])->group(function () {
        Route::get('/index', [AnnualLeaveController::class, 'index'])->name('leave.index');
    });

    Route::middleware(['auth:admin,staff,accountant'])->group(function () {
        Route::get('/show/{id}', [AnnualLeaveController::class, 'show'])->name('leave.show');
    });
});

Route::prefix('ajax')->group(function () {
    Route::middleware(['auth:super_admin'])->group(function () {
        Route::get('/staffs', [StaffController::class, 'ajaxGetAll'])->name('ajax.getAllStaff');
        Route::get('/count-staff', [DashboardController::class, 'countStaff'])->name('ajax.countStaff');
        Route::get('/get-noti', [DashboardController::class, 'getNotificationInMonth'])->name('ajax.getNotificationInMonth');
        Route::get('/get-new-staff', [DashboardController::class, 'getNewStaff'])->name('ajax.getNewStaff');
        Route::get('/get-organization', [OrganizationController::class, 'ajaxGetPersonnelOrganization'])->name('ajax.getPersonnelOrganization');    
    });
});

Route::prefix('filter')->group(function () {
    Route::middleware(['auth:admin,account'])->group(function () {
        Route::get('/search', [FilterController::class, 'search'])->name('filter.search');
        Route::get('/sort-by', [FilterController::class, 'sort'])->name('filter.sort');
    });
});

Route::prefix('mail')->group(function () {
    Route::middleware(['auth:admin,account'])->group(function () {
        Route::get('/edit', [MailController::class, 'edit'])->name('mail.edit');
        Route::post('/send', [MailController::class, 'send'])->name('mail.send');
    });
});

Route::get('/chat', function () {
    return view('chat.show');
})->name('chat.show');
