<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login.index');
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
