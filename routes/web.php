<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about', [HomeController::class, "about"])->name('about');
Route::get('/add-student', [HomeController::class, "addstudent"])->name('addstudent');
Route::post('/insert', [HomeController::class, "insertstudent"])->name('insertstudent');
Route::get('/edit/{id}', [HomeController::class, "edit"])->name('edit');
Route::get('/delete/{id}', [HomeController::class, "delete"])->name('delete');
Route::post('/update', [HomeController::class, "update"])->name('update');
