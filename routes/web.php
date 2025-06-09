<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EtatController;
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

    //Groupes de routes pour les employes
    Route::prefix('employers')->group(function () {
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::post('/create', [EmployerController::class, 'store'])->name('employer.store');
        Route::post('/store-depart/{employer}', [EmployerController::class, 'storedep'])->name('employer.storedep');
        Route::delete('/delete-depart/{employer}', [EmployerController::class, 'deletedep'])->name('employer.deletedep');
        Route::delete('/{employer}', [EmployerController::class, 'delete'])->name('employer.delete');
        Route::get('/show/{employer}', [EmployerController::class, 'show'])->name('employer.show');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update');
    });

    //Groupes de routes pour les departements
    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/create', [DepartmentController::class, 'store'])->name('department.store');
        Route::delete('/{department}', [DepartmentController::class, 'delete'])->name('department.delete');
        Route::get('/show/{department}', [DepartmentController::class, 'show'])->name('department.show');
        Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::put('/update/{department}', [DepartmentController::class, 'update'])->name('department.update');
    });

    //Groupes de routes pour les "etat" (status)
    Route::prefix('state')->group(function () {
        Route::get('/', [EtatController::class, 'index'])->name('state.index');
        Route::get('/create/{employe}', [EtatController::class, 'create'])->name('state.create');
        Route::post('/store', [EtatController::class, 'store'])->name('state.store');
        Route::get('/edit/{state}', [EtatController::class, 'edit'])->name('state.edit');
        Route::put('/update/{state}', [EtatController::class, 'update'])->name('state.update');
        Route::delete('/create/{state}', [EtatController::class, 'delete'])->name('state.delete');
    });
});

