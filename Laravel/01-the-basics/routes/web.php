<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('guest')->name('login');

Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);
Route::get('/dashboard', DashboardController::class)->middleware('auth');
