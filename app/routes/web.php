<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/', function () {
    return view('home');
})
    -> name('home');

Route::get('/catalog', [CatalogController::class, 'index'])
    -> name('catalog');

Route::get('/sign', function () {
    return view('sign');
}) -> name('sign');

Route::post('/sign/login', [LoginController::class, 'login'])
    -> name('login-form');
Route::get('/logout', [LoginController::class, 'logout'])
    -> name('logout');

Route::post('/sign/register', [RegisterController::class, 'register'])
    -> name('register-form');

Route::get('/user', function () {
    $user = auth()->user();
    return view('user')->with('user', $user);
})
    -> name('user');

Route::get('/calendar', function () {
    return view('calendar');
})
    -> name('calendar');
