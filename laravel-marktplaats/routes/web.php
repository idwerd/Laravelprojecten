<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



Route::get('/', [AdvertController::class, 'index'])->name('adverts.index');
Route::get('/advert', [AdvertController::class, 'show'])->name('adverts.show');
Route::get('/adverts/create', [AdvertController::class, 'create'])->name('adverts.create');
Route::get('/adverts/advert/{advert}', [AdvertController::class, 'show'])->name('adverts.advert');
Route::get('/adverts/edit/{advert}', [AdvertController::class, 'edit'])->name('adverts.edit');
Route::post('/adverts/delete/{advert}', [AdvertController::class, 'destroy'])->name('adverts.delete');
Route::post('/adverts/create', [AdvertController::class, 'store'])->name('adverts.store');
Route::post('/adverts/edit/{advert}', [AdvertController::class, 'update'])->name('adverts.update');
Route::post('/adverts/filter', [AdvertController::class, 'filter'])->name('adverts.filter');
Route::post('adverts/advert/bid/{advert}', [AdvertController::class, 'bid'])->name('adverts.bid');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');
Route::post('/account/login', [AuthController::class, 'authenticate'])->name('account.auth');
Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');
Route::get('/account/logout', [AuthController::class, 'logout'])->name('account.logout');

Route::get('/account/dashboard', [UserController::class, 'index'])->name('account.dashboard')->middleware('auth.basic');