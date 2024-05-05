<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LinkClickController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VisitedPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::get('/home', [HomeController::class, 'create']) -> name('home');

Route::get('/catalog', [CatalogController::class, 'index']) -> middleware('track.pages') -> name('catalog');
Route::get('/catalog/{id}', [CatalogController::class, 'showLot']) -> middleware('track.pages') -> name('lot.show');

Route::get('/calendar', [CalendarController::class, 'index']) -> middleware('track.pages') -> name('calendar');

Route::get('/visited-pages', [VisitedPagesController::class, 'index']) -> name('visited.pages');

Route::get('/admin-dashboard', [AdminDashboardController::class, 'index']) -> middleware(['auth', 'admin']) -> name('admin.dashboard');
Route::get('/admin/users/{userId}/edit', [AdminDashboardController::class, 'editUser']) -> middleware(['auth', 'admin']) ->name('admin.user.edit');
Route::put('/admin/users/{userId}/update', [AdminDashboardController::class, 'updateUser']) -> middleware(['auth', 'admin']) ->name('admin.user.update');
Route::get('/admin/users/{userId}/send-email', [AdminDashboardController::class, 'sendEmailForm']) -> middleware(['auth', 'admin']) -> name('admin.user.sendEmailForm');
Route::post('/admin/users/{userId}/send-email', [AdminDashboardController::class, 'sendEmail']) -> middleware(['auth', 'admin']) -> name('admin.user.sendEmail');

Route::get('/trackLink', [LinkClickController::class, 'handle'])->name('redirect');

Route::get('/login', [LoginController::class, 'create']) -> middleware('track.pages') -> name('login');
Route::post('/sign/login', [LoginController::class, 'login']) -> name('login.try');
Route::get('/register', [RegisterController::class, 'create']) -> middleware('track.pages') -> name('register');
Route::post('/sign/register', [RegisterController::class, 'register']) -> name('register.try');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create']) -> middleware('track.pages') -> name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']) -> name('password.email');
Route::get('/reset-password/{email}/{token}', [ResetPasswordController::class, 'create']) -> middleware('track.pages') -> name('password.reset');
Route::post('/reset-password/{email}/{token}', [ResetPasswordController::class, 'update']) -> name('password.update');

Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');
Route::get('/user', function () { $user = auth()->user(); return view('user')->with('user', $user); }) -> middleware(['auth', 'track.pages']) -> name('user');
