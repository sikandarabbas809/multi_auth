<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/courses', [AdminController::class, 'index'])->name('admin.courses.index');
    Route::get('/courses/create', [AdminController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses/store', [AdminController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/{course}/edit', [AdminController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/courses/{course}', [AdminController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{course}', [AdminController::class, 'destroy'])->name('admin.courses.delete');
});

Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => 'teacher'], function () {
    Route::get('/courses', [TeacherController::class, 'index'])->name('teacher.courses.index');
    Route::get('/courses/create', [TeacherController::class, 'create'])->name('teacher.courses.create');
    Route::post('/courses/store', [TeacherController::class, 'store'])->name('teacher.courses.store');
    Route::get('/courses/{course}/edit', [TeacherController::class, 'edit'])->name('teacher.courses.edit');
    Route::put('/courses/{course}', [TeacherController::class, 'update'])->name('teacher.courses.update');
    Route::delete('/courses/{course}', [TeacherController::class, 'destroy'])->name('teacher.courses.delete');
});

Route::group(['middleware' => ['auth', 'student'], 'prefix' => 'student'], function () {
    Route::get('/courses', [StudentController::class, 'index'])->name('student.courses.index');
    
});


