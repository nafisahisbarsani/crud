<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/student', [StudentController::class, 'index']);
Route::get('/grade', [GradeController::class, 'index']);
Route::get('/department', [DepartmentController::class, 'index']);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('students')->name('student.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\StudentController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\StudentController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [\App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('edit');
        Route::put('/update/{student}', [\App\Http\Controllers\Admin\StudentController::class, 'update'])->name('update');
        Route::delete('/{student}', [\App\Http\Controllers\Admin\StudentController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('grade')->name('grade.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\GradeController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\GradeController::class, 'create'])->name('create');
            Route::post('/store', [\App\Http\Controllers\Admin\GradeController::class, 'store'])->name('store');
            Route::get('/edit/{grade}', [\App\Http\Controllers\Admin\GradeController::class, 'edit'])->name('edit');
            Route::put('/update/{grade}', [\App\Http\Controllers\Admin\GradeController::class, 'update'])->name('update');
            Route::delete('/{grade}', [\App\Http\Controllers\Admin\GradeController::class, 'destroy'])->name('destroy');
     });

     Route::prefix('department')->name('department.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\DepartmentController::class, 'create'])->name('create');
            Route::post('/store', [\App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('store');
            Route::get('/edit/{department}', [\App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('edit');
            Route::put('/update/{department}', [\App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('update');
            Route::delete('/{department}', [\App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->name('destroy');
        });

    });



