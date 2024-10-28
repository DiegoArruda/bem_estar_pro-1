<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('admin.login.index');
Route::post('/auth', [LoginController::class, 'auth'])->name('admin.login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.login.logout');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::controller(QuestionController::class)->middleware('verifyuser')->group(function () {
    Route::get('admin/questions', 'index')->name('questions.index');
    Route::get('admin/questions/create', 'create')->name('questions.create');
    Route::post('admin/questions', 'store')->name('questions.store');
    Route::get('admin/questions/{id}/edit', 'edit')->name('questions.edit');
    Route::put('admin/questions/{id}', 'update')->name('questions.update');
    Route::delete('admin/questions/{id}', 'destroy')->name('questions.destroy');
    Route::get('admin/questions/{id}', 'show')->name('questions.show');
});

Route::controller(DepartmentController::class)->middleware('verifyuser')->group(function () {
    Route::get('admin/departments', 'index')->name('departments.index');
    Route::get('admin/departments/create', 'create')->name('departments.create');
    Route::post('admin/departments', 'store')->name('departments.store');
    Route::get('admin/departments/{id}/edit', 'edit')->name('departments.edit');
    Route::put('admin/departments/{id}', 'update')->name('departments.update');
    Route::delete('admin/departments/{id}', 'destroy')->name('departments.destroy');
    Route::get('admin/departments/{id}', 'show')->name('departments.show');
});

Route::controller(EmployeeController::class)->middleware('verifyuser')->group(function () {
    Route::get('admin/employees', 'index')->name('employees.index');
    Route::get('admin/employees/create', 'create')->name('employees.create');
    Route::post('admin/employees', 'store')->name('employees.store');
    Route::get('admin/employees/{id}/edit', 'edit')->name('employees.edit');
    Route::put('admin/employees/{id}', 'update')->name('employees.update');
    Route::delete('/employees/{id}', 'destroy')->name('employees.destroy');
    Route::get('admin/employees/{id}', 'show')->name('employees.show');
});

Route::controller(UserController::class)->middleware('verifyuser')->group(function () {
    Route::get('admin/users', 'index')->name('users.index');
    Route::get('admin/users/create', 'create')->name('users.create');
    Route::post('admin/users', 'store')->name('users.store');
    Route::get('admin/users/{id}/edit', 'edit')->name('users.edit');
    Route::put('admin/users/{id}', 'update')->name('users.update');
    Route::delete('admin/users/{id}', 'destroy')->name('users.destroy');
    Route::get('admin/users/{id}', 'show')->name('users.show');
});

Route::controller(ContentController::class)->middleware('verifyuser')->group(function(){
    Route::get('admin/contents', 'index')->name('contents.index');
    Route::get('admin/contents/create', 'create')->name('contents.create');
    Route::post('admin/contents', 'store')->name('contents.store');
    Route::get('admin/contents/{id}/edit', 'edit')->name('contents.edit');
    Route::put('admin/contents/{id}', 'update')->name('contents.update');
    Route::delete('admin/contents/{id}', 'destroy')->name('contents.destroy');
    Route::get('admin/contents/{id}', 'show')->name('contents.show');
});
