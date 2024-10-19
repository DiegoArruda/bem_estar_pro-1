<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login.index');
});
// Criando as Rotas das Questões
Route::controller(QuestionController::class)->group(function () {
    Route::get('admin/questions', 'index')->name('questions.index');
    Route::get('admin/questions/create', 'create')->name('questions.create');
    Route::post('admin/questions', 'store')->name('questions.store');
    Route::get('admin/questions/{id}/edit', 'edit')->name('questions.edit');
    Route::put('admin/questions/{id}', 'update')->name('questions.update');
    Route::delete('admin/questions/{id}', 'destroy')->name('questions.destroy');
    Route::get('admin/questions/{id}', 'show')->name('questions.show');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('admin/employees', 'index')->name('employees.index');
    Route::get('admin/employees/create', 'create')->name('employees.create');
    Route::post('admin/employees', 'store')->name('employees.store');
    Route::get('admin/employees/{id}/edit', 'edit')->name('employees.edit');
    Route::put('admin/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
    Route::get('admin/employees/{id}', 'show')->name('employees.show');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('admin/departments', 'index')->name('departments.index');
    Route::get('admin/departments/create', 'create')->name('departments.create');
});