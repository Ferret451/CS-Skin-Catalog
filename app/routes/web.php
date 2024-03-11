<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/', function () {
    return view('home');
});

Route::get('/catalog', [CatalogController::class, 'index']);

Route::get('/user', function () {
    return view('user');
});

Route::get('/calendar', function () {
    return view('calendar');
});
