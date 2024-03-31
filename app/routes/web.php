<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisitedPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/home', function () {
    return view('home');
})
    -> name('home')
    ->middleware('track-pages');

Route::get('/catalog', [CatalogController::class, 'index'])
    -> name('catalog')
    ->middleware('track-pages');


Route::get('/sign', function () {
    return view('sign');
})
    -> name('sign')
    -> middleware('track-pages');

Route::post('/sign/login', [LoginController::class, 'login'])
    -> name('login');
Route::get('/logout', [LoginController::class, 'logout'])
    -> name('logout');

Route::post('/sign/register', [RegisterController::class, 'register'])
    -> name('register-form');

Route::get('/user', function () {
    $user = auth()->user();
    return view('user')->with('user', $user);
})
    -> name('user')
    -> middleware('auth')
    -> middleware('track-pages');

Route::get('/calendar', [CalendarController::class, 'index'])
    -> name('calendar');

Route::get('/visited-pages', [VisitedPagesController::class, 'index'])
    ->name('visited-pages');
