<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertController;



Route::get('/', [AdvertController::class, 'index'])
->name('adverts.index');
Route::get('/advert', [AdvertController::class, 'show'])
->name('adverts.show');
Route::get('/adverts/create', [AdvertController::class, 'create'])
->name('adverts.create');
Route::get('/adverts/advert/{advert}', [AdvertController::class, 'show'])
->name('adverts.advert');
Route::get('/adverts/edit/{advert}', [AdvertController::class, 'edit'])
->name('adverts.edit');
Route::post('/adverts/delete/{advert}', [AdvertController::class, 'destroy'])
->name('adverts.delete');
Route::post('/adverts/create', [AdvertController::class, 'store'])
->name('adverts.store');
Route::post('/adverts/edit/{advert}', [AdvertController::class, 'update'])
->name('adverts.update');
Route::post('/adverts/filter', [AdvertController::class, 'filter'])
->name('adverts.filter');
Route::post('adverts/advert/bid/{advert}', [AdvertController::class, 'bid'])
->name('adverts.bid');
Route::post('/adverts/promote/{advert}', [AdvertController::class, 'promote'])
->name('adverts.promote');
Route::post('/adverts/search', [AdvertController::class, 'search'])
->name('adverts.search');

Route::view('/account/login', 'account.login')
->middleware('guest')
->name('account.login');
Route::view('/account/register', 'account.register')
->middleware('guest')
->name('account.register');

Route::post('/account/login', [LoginController::class, 'authenticate'])
->name('login.auth');
Route::post('/account/register', [RegisterController::class, '__invoke'])
->name('register.auth');

Route::get('/account/dashboard', [AccountController::class, 'index'])
->middleware('auth.basic')
->name('account.dashboard');
Route::get('/account/logout', [AccountController::class, 'logout'])
->name('account.logout');




