<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'redirectToProvider'])->name('login');
Route::get('/login/callback', [AuthController::class, 'handleProviderCallback'])->name('login.callback');