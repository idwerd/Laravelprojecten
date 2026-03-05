<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/blog/{id}', [BlogController::class, 'show'])->name('blogs.blog');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::get('/blogs/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::get('/users/login', [LoginController::class, 'login'])->name('users.login');


Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::post('/blogs/blog/{id}', [CommentController::class, 'store'])->name('comments.store');

Route::redirect('/', '/users/login');

//Route::get('/', function () {return view('welcome');});
