<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'handlelogin'])->name('login');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
