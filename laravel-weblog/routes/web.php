<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('users/login', [UserController::class, 'login'])->name('users.login');

Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

//Route::redirect('/', '/blogs');

//Route::get('/', function () {return view('welcome');});
