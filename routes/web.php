<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\PreRegistersController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});


// Authentication
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/forgot-password', 'forgotPassword')->name('forgotPassword');
        Route::get('/sign-in', 'signin')->name('signin');
        Route::get('/sign-up', 'signup')->name('signup');
    });
});


// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/index', 'index')->name('index');      
    });
});


// Settings
Route::prefix('settings')->group(function () {
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/company', 'company')->name('company');
        Route::get('/currencies', 'currencies')->name('currencies');
        Route::get('/language', 'language')->name('language');
        Route::get('/notification', 'notification')->name('notification');
        Route::get('/notification-alert', 'notificationAlert')->name('notificationAlert');
        Route::get('/payment-gateway', 'paymentGateway')->name('paymentGateway');
        Route::get('/theme', 'theme')->name('theme');
    });
});

// Users
Route::prefix('users')->group(function () {
    Route::controller(UsersController::class)->group(function () {
        Route::get('/add-user', 'addUser')->name('addUser');
        Route::post('/save-user', 'saveUser')->name('saveUser');
        Route::get('/edit-user/{id}', 'editUser')->name('editUser');
        Route::put('/update-user/{id}', 'updateUser')->name('updateUser');
        Route::get('/delete-user/{id}', 'deleteUser')->name('deleteUser');
        Route::get('/users-list', 'usersList')->name('usersList');
        Route::get('/employees-list', 'employeesList')->name('employeesList');
        Route::get('/view-profile/{id}', 'viewProfile')->name('viewProfile');
        Route::put('/update-password/{id}', 'updatePassword')->name('updatePassword');
    });
});

// Departments
Route::prefix('departments')->group(function () {
    Route::controller(DepartmentsController::class)->group(function () {
        Route::get('/add-department', 'addDepartment')->name('addDepartment');
        Route::get('/departments-list', 'departmentsList')->name('departmentsList');
        Route::post('/save-department', 'saveDepartment')->name('saveDepartment');
        Route::get('/edit-department/{id}', 'editDepartment')->name('editDepartment');
        Route::put('/update-department/{id}', 'updateDepartment')->name('updateDepartment');
        Route::get('/delete-department/{id}', 'deleteDepartment')->name('deleteDepartment');
    });
});

// Visitors
Route::prefix('visitors')->group(function () {
    Route::controller(VisitorsController::class)->group(function () {
        Route::get('/add-visitor', 'addVisitor')->name('addVisitor');
        Route::get('/visitors-list', 'visitorsList')->name('visitorsList');
        Route::get('/view-visitor/{id}', 'viewVisitor')->name('viewVisitor');
        Route::get('/walk-in-visitors', 'walkInVisitors')->name('walkInVisitors');
        Route::post('/save-visitor', 'saveVisitor')->name('saveVisitor');
        Route::get('/edit-visitor/{id}', 'editVisitor')->name('editVisitor');
        Route::put('/update-visitor/{id}', 'updateVisitor')->name('updateVisitor');
        Route::get('/delete-visitor/{id}', 'deleteVisitor')->name('deleteVisitor');
        Route::get('/accept-visitor/{id}', 'acceptVisitor')->name('acceptVisitor');
        Route::get('/reject-visitor/{id}', 'rejectVisitor')->name('rejectVisitor');
        Route::get('/generate-card/{id}', 'generateVisitorCard')->name('generateVisitorCard');
    });
});

// Pre-Registers
Route::prefix('pre-registers')->group(function () {
    Route::controller(PreRegistersController::class)->group(function () {
        Route::get('/add-pre-register', 'addPreRegister')->name('addPreRegister');
        Route::get('/pre-registers-list', 'preRegistersList')->name('preRegistersList');
        Route::get('/view-pre-register/{id}', 'viewPreRegister')->name('viewPreRegister');
        Route::post('/save-pre-register', 'savePreRegister')->name('savePreRegister');
        Route::get('/edit-pre-register/{id}', 'editPreRegister')->name('editPreRegister');
        Route::put('/update-pre-register/{id}', 'updatePreRegister')->name('updatePreRegister');
        Route::get('/delete-pre-register/{id}', 'deletePreRegister')->name('deletePreRegister');
    });
});

