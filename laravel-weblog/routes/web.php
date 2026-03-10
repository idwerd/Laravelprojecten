<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/blog/{id}', [BlogController::class, 'show'])->name('blogs.blog');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');
Route::post('/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::post('/blogs/blog/{id}', [CommentController::class, 'store'])->name('comments.store');

Route::get('/users/login', [LoginController::class, 'login'])->name('users.login');
Route::get('users/logout', [LoginController::class, 'logout'])->name('users.logout');
Route::post('/users/login', [LoginController::class, 'authenticate'])->name('users.authenticate');

Route::get('/users/dashboard', [UserController::class, 'index'])->name('users.dashboard');

Route::redirect('/', '/blogs');

//Route::get('/', function () {return view('welcome');});
