<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, "index"])->name('home');
Route::get('/about', [StudentController::class, "about"])->name('about');
Route::get('/add-student', [StudentController::class, "addstudent"])->name('addstudent');
Route::post('/insert', [StudentController::class, "insertstudent"])->name('insertstudent');
Route::get('/edit/{id}', [StudentController::class, "edit"])->name('edit');
Route::get('/delete/{id}', [StudentController::class, "delete"])->name('delete');
Route::post('/update', [StudentController::class, "update"])->name('update');