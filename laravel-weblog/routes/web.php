<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\CategoryController;

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/premium', [BlogController::class, 'premium'])->name('blogs.premium');
Route::get('/blogs/blog/{id}', [BlogController::class, 'show'])->name('blogs.blog');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
Route::post('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');
Route::post('/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::get('/blogs/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/blogs/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::post('/blogs/blog/{id}', [CommentController::class, 'store'])->name('comments.store');

Route::get('/users/login', [LoginController::class, 'login'])->name('users.login');
Route::get('users/logout', [LoginController::class, 'logout'])->name('users.logout');
Route::post('/users/login', [LoginController::class, 'authenticate'])->name('users.authenticate');

Route::get('/users/dashboard', [UserController::class, 'index'])->name('users.dashboard');
Route::post('/users/premium', [UserController::class, 'premium'])->name('users.premium');

Route::get('/errors/401', [ErrorController::class, 'unauthorized'])->name('error.401');
Route::get('/errors/403', [ErrorController::class, 'forbidden'])->name('error.403');



Route::redirect('/', '/blogs');



//Route::get('/', function () {return view('welcome');});
