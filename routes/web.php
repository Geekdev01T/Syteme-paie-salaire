<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\EmployerController;
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

    //Groupes de routes pour les employeurs
    Route::prefix('employer')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
    });
});

