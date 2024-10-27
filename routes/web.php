<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDeletedController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

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

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


