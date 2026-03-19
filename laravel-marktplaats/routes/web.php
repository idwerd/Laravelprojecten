<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthController;


Route::get('/', [AdvertController::class, 'index'])->name('adverts.index');
Route::get('/advert', [AdvertController::class, 'show'])->name('adverts.show');

Route::get('/account/login', [AuthController::class, 'login'])->name('account.login');
Route::get('/account/register', [AuthController::class, 'register'])->name('account.register');