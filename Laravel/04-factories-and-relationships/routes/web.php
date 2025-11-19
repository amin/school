<?php

use App\Http\Controllers\CompleteTaskController;
use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\OpenTaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteTaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('guest')->name('login');

Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);

Route::get('/dashboard', DashboardController::class)->middleware('auth');
Route::post('/tasks', [CreateTaskController::class, 'store'])->middleware('auth');
Route::patch('/tasks/{task}/open', OpenTaskController::class);
Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
Route::patch('/tasks/{task}/delete', DeleteTaskController::class);
