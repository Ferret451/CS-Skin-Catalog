<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisitedPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/home', function () { return view('home'); }) -> middleware('track-pages') -> name('home');

Route::get('/catalog', [CatalogController::class, 'index']) -> middleware('track-pages') -> name('catalog');

Route::get('/calendar', [CalendarController::class, 'index']) -> name('calendar');

Route::get('/visited-pages', [VisitedPagesController::class, 'index']) ->name('visited-pages');

Route::get('/sign', function () { return view('sign'); }) -> middleware('track-pages') -> name('sign');
Route::post('/sign/login', [LoginController::class, 'login']) -> name('login');
Route::post('/sign/register', [RegisterController::class, 'register']) -> name('register');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');
Route::get('/user', function () { $user = auth()->user(); return view('user')->with('user', $user); }) -> middleware(['auth', 'track-pages']) -> name('user');
