<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VisitedPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/home', [HomeController::class, 'create']) -> name('home');
Route::get('/catalog', [CatalogController::class, 'index']) -> middleware('track.pages') -> name('catalog');
Route::get('/calendar', [CalendarController::class, 'index']) -> middleware('track.pages') -> name('calendar');

Route::get('/visited-pages', [VisitedPagesController::class, 'index']) -> name('visited.pages');
Route::post('/visited-pages', [VisitedPagesController::class, 'clear']) -> name('clear.visited');

Route::get('/login', [LoginController::class, 'create']) -> middleware('track.pages') -> name('login');
Route::post('/sign/login', [LoginController::class, 'login']) -> name('login.try');
Route::get('/register', [RegisterController::class, 'create']) -> middleware('track.pages') -> name('register');
Route::post('/sign/register', [RegisterController::class, 'register']) -> name('register.try');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create']) -> name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']) -> name('password.email');
Route::get('/reset-password/{email}/{token}', [ResetPasswordController::class, 'create']) -> name('password.reset');
Route::post('/reset-password/{email}/{token}', [ResetPasswordController::class, 'update']) -> name('password.update');

Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');
Route::get('/user', function () { $user = auth()->user(); return view('user')->with('user', $user); }) -> middleware(['auth', 'track.pages']) -> name('user');
