<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\PreRegistersController;
use App\Http\Controllers\NotificationController;
use App\Livewire\UserList;
use Laravel\Fortify\Fortify;


Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return response()->json(['success' => 'Cache cleared successfully']);
});

Route::get('/storagelink', function() {
    Artisan::call('storage:link');
    return response()->json(['success' => 'Storage link created successfully']);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get('/public/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/public/livewire/update', $handle);
});

// For basic authentication
Route::middleware(['auth'])->group(function () {
    // Protected web routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/visitor-stats', 'getVisitorStats')->name('visitorStats');
    });

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllRead');

    // Users
    Route::get('users-list', [UsersController::class, 'usersList'])->name('usersList');
    Route::get('employees-list', [UsersController::class, 'employeesList'])->name('employeesList');
    Route::get('view-profile/{id}', [UsersController::class, 'viewProfile'])->name('viewProfile');
    Route::get('update-password/{id}', [UsersController::class, 'updatePassword'])->name('updatePassword');
    Route::post('save-user', [UsersController::class, 'saveUser'])->name('saveUser');
    Route::get('edit-user/{id}', [UsersController::class, 'editUser'])->name('editUser');
    Route::put('update-user/{id}', [UsersController::class, 'updateUser'])->name('updateUser');
    Route::get('delete-user/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');
    Route::get('add-user', [UsersController::class, 'addUser'])->name('addUser');

    // Departments
    Route::get('departments-list', [DepartmentsController::class, 'departmentsList'])->name('departmentsList');
    Route::get('add-department', [DepartmentsController::class, 'addDepartment'])->name('addDepartment');
    Route::post('save-department', [DepartmentsController::class, 'saveDepartment'])->name('saveDepartment');
    Route::get('edit-department/{id}', [DepartmentsController::class, 'editDepartment'])->name('editDepartment');
    Route::put('update-department/{id}', [DepartmentsController::class, 'updateDepartment'])->name('updateDepartment');
    Route::get('delete-department/{id}', [DepartmentsController::class, 'deleteDepartment'])->name('deleteDepartment');
   
    // Visitors
    Route::get('visitors-list', [VisitorsController::class, 'visitorsList'])->name('visitorsList');
    Route::get('add-visitor', [VisitorsController::class, 'addVisitor'])->name('addVisitor');
    Route::post('save-visitor', [VisitorsController::class, 'saveVisitor'])->name('saveVisitor');
    Route::get('edit-visitor/{id}', [VisitorsController::class, 'editVisitor'])->name('editVisitor');
    Route::put('update-visitor/{id}', [VisitorsController::class, 'updateVisitor'])->name('updateVisitor');
    Route::get('delete-visitor/{id}', [VisitorsController::class, 'deleteVisitor'])->name('deleteVisitor');
    Route::get('view-visitor/{id}', [VisitorsController::class, 'viewVisitor'])->name('viewVisitor');
    Route::get('walk-in-visitors', [VisitorsController::class, 'walkInVisitors'])->name('walkInVisitors');
    Route::get('accept-visitor/{id}', [VisitorsController::class, 'acceptVisitor'])->name('acceptVisitor');
    Route::get('reject-visitor/{id}', [VisitorsController::class, 'rejectVisitor'])->name('rejectVisitor');
    Route::get('generate-card/{id}', [VisitorsController::class, 'generateVisitorCard'])->name('generateVisitorCard');
    Route::get('check-in/{id}', [VisitorsController::class, 'checkIn'])->name('checkIn');
    Route::get('check-out/{id}', [VisitorsController::class, 'checkOut'])->name('checkOut');
    Route::get('notify-host/{id}', [VisitorsController::class, 'notifyHost'])->name('notifyHost');

    // Pre-Registers
    Route::get('pre-registers-list', [PreRegistersController::class, 'preRegistersList'])->name('preRegistersList');
    Route::get('add-pre-register', [PreRegistersController::class, 'addPreRegister'])->name('addPreRegister');
    Route::post('save-pre-register', [PreRegistersController::class, 'savePreRegister'])->name('savePreRegister');
    Route::get('edit-pre-register/{id}', [PreRegistersController::class, 'editPreRegister'])->name('editPreRegister');
    Route::put('update-pre-register/{id}', [PreRegistersController::class, 'updatePreRegister'])->name('updatePreRegister');
    Route::get('delete-pre-register/{id}', [PreRegistersController::class, 'deletePreRegister'])->name('deletePreRegister');
    Route::get('view-pre-register/{id}', [PreRegistersController::class, 'viewPreRegister'])->name('viewPreRegister');

});
 

// // For authentication + email verification
// Route::middleware(['auth', 'verified'])->group(function () {
//     // Protected & verified routes
// });





