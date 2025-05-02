<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;





//Routes securisées

//seulement lorsque l'utilisateur est deconnecter
Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/', [LoginController::class, 'handlelogin'])->name('login');
    }
);

//seulement lorsque l'utilisateur est connecter
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');
});

