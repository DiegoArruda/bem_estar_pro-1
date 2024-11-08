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

Route::prefix('admin')->controller(DashboardController::class)->middleware('verifyuser')->group(function () {
    Route::get('dashboard', 'index')->name('dashboard.index');
});

Route::prefix('admin')->controller(QuestionController::class)->middleware('verifyuser')->group(function () {
    Route::get('questions', 'index')->name('questions.index');
    Route::get('questions/create', 'create')->name('questions.create');
    Route::post('questions', 'store')->name('questions.store');
    Route::get('questions/{id}/edit', 'edit')->name('questions.edit');
    Route::put('questions/{id}', 'update')->name('questions.update');
    Route::delete('questions/{id}', 'destroy')->name('questions.destroy');
    Route::get('questions/{id}', 'show')->name('questions.show');
});

Route::prefix('admin')->controller(DepartmentController::class)->middleware('verifyuser')->group(function () {
    Route::get('departments', 'index')->name('departments.index');
    Route::get('departments/create', 'create')->name('departments.create');
    Route::post('departments', 'store')->name('departments.store');
    Route::get('departments/{id}/edit', 'edit')->name('departments.edit');
    Route::put('departments/{id}', 'update')->name('departments.update');
    Route::delete('departments/{id}', 'destroy')->name('departments.destroy');
    Route::get('departments/{id}', 'show')->name('departments.show');
});

Route::prefix('admin')->controller(EmployeeController::class)->middleware('verifyuser')->group(function () {
    Route::get('employees', 'index')->name('employees.index');
    Route::get('employees/create', 'create')->name('employees.create');
    Route::post('employees', 'store')->name('employees.store');
    Route::get('employees/{id}/edit', 'edit')->name('employees.edit');
    Route::put('employees/{id}', 'update')->name('employees.update');
    Route::delete('employees/{id}', 'destroy')->name('employees.destroy');
    Route::get('employees/{id}', 'show')->name('employees.show');
});

Route::prefix('admin')->controller(UserController::class)->middleware('verifyuser')->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::get('users/{id}/edit', 'edit')->name('users.edit');
    Route::put('users/{id}', 'update')->name('users.update');
    Route::delete('users/{id}', 'destroy')->name('users.destroy');
    Route::get('users/{id}', 'show')->name('users.show');
});

Route::prefix('admin')->controller(ContentController::class)->middleware('verifyuser')->group(function(){
    Route::get('contents', 'index')->name('contents.index');
    Route::get('contents/create', 'create')->name('contents.create');
    Route::post('contents', 'store')->name('contents.store');
    Route::get('contents/{id}/edit', 'edit')->name('contents.edit');
    Route::put('contents/{id}', 'update')->name('contents.update');
    Route::delete('contents/{id}', 'destroy')->name('contents.destroy');
    Route::get('contents/{id}', 'show')->name('contents.show');
});
