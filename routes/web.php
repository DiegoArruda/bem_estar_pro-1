<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('admin.login.index');
});


Route::controller(DepartmentController::class)->group(function(){
    Route::get('admin/departments', 'index')->name('departments.index');
    Route::get('admin/departments/create', 'create')->name('departments.create');
    Route::post('admin/departments', 'store')->name('departments.store');
    Route::get('admin/departments/{id}/edit', 'edit')->name('departments.edit');
    Route::put('admin/departments/{id}', 'update')->name('departments.update');
    Route::delete('admin/departments/{id}', 'destroy')->name('departments.destroy');
    Route::get('admin/departments/{id}', 'show')->name('departments.show');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('admin/employees', 'index')->name('employees.index');
    Route::get('admin/employees/create', 'create')->name('employees.create');
    Route::post('admin/employees', 'store')->name('employees.store');
    Route::get('admin/employees/{id}/edit', 'edit')->name('employees.edit');
    Route::put('admin/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
    Route::get('admin/employees/{id}', 'show')->name('employees.show');
});
