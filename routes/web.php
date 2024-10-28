<?php

use App\Http\Controllers\AttendanceSheetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDeletedController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ScheduleProfileController;
use App\Http\Controllers\ScheduleSettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::resource('timecard', TimeCardController::class);
Route::get('/timecard', function () {
    return view('timecard.index');
})->name('timecard');

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    
    // Main
    Route::resource('/', DashboardController::class );
    
    // Employee
    Route::resource('employees', EmployeeController::class);

    Route::get('employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    Route::get('employees-deleted/restore/{id}', [EmployeeDeletedController::class, 'restore'])->name('employees-deleted.restore');

    Route::resource('employees-deleted', EmployeeDeletedController::class);

    // Position
    Route::resource('position', PositionController::class);

    // Department
    Route::resource('department',DepartmentController::class);

    // Schedule Settings
    Route::resource('schedulesettings',ScheduleSettingsController::class);

    // Schedule Profile
    Route::resource('scheduleprofile',ScheduleProfileController::class);

    // Attendance Sheet
    Route::resource('attendancesheet',AttendanceSheetController::class);

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


