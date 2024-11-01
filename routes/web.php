<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginEmployeeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Login da área funcionário
Route::get('/', [LoginEmployeeController::class, 'index'])->name('home.login.index');

Route::prefix('home')->group(function () {
    Route::post('auth', [LoginEmployeeController::class, 'auth'])->name('home.login.auth');
    Route::get('logout', [LoginEmployeeController::class, 'logout'])->name('home.login.logout');
    Route::get('tests', [TestController::class, 'index'])->name('home.tests.index');
    Route::post('tests', [TestController::class, 'store'])->name('home.tests.store');
    Route::get('contents', [ContentController::class, 'list'])->name('home.contents.index');
});

// Login da área admim
Route::get('admin', [LoginController::class, 'index'])->name('admin.login.index');
Route::post('admin/auth', [LoginController::class, 'auth'])->name('admin.login.auth');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.login.logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('verifyuser');

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
    Route::delete('admin/employees/{id}', 'destroy')->name('employees.destroy');
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
