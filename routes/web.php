<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\BookController;





Route::get('/',[Controller::class, 'index'])->name('/');

Route::resource('/home/user', UserController::class)->name('user','*');
Route::resource('/home/genre', GenreController::class)->name('genre','*');
Route::resource('/home/books', BookController::class)->name('book','*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

