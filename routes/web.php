<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\StateDelayController;
use App\Http\Controllers\StateSheetController;
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

    //Groupes de routes pour les "etat" de presence
    Route::prefix('states')->group(function () {
        Route::get('/', [StateController::class, 'index'])->name('state.index');
        Route::get('/create/{employe}', [StateController::class, 'create'])->name('state.create');
        Route::post('/store', [StateController::class, 'store'])->name('state.store');
        Route::get('/edit/{state}', [StateController::class, 'edit'])->name('state.edit');
        Route::put('/update/{state}', [StateController::class, 'update'])->name('state.update');
        Route::delete('/create/{state}', [StateController::class, 'delete'])->name('state.delete');
    });

    //Groupes de routes pour les "etat" de retard
    Route::prefix('states-delay')->group(function () {
        Route::get('/', [StateDelayController::class, 'index'])->name('state_delay.index');
        Route::get('/create/{employe}', [StateDelayController::class, 'create'])->name('state_delay.create');
        Route::post('/store', [StateDelayController::class, 'store'])->name('state_delay.store');
        Route::get('/edit/{state_delay}', [StateDelayController::class, 'edit'])->name('state_delay.edit');
        Route::put('/update/{state_delay}', [StateDelayController::class, 'update'])->name('state_delay.update');
        Route::delete('/create/{state_delay}', [StateDelayController::class, 'delete'])->name('state_delay.delete');
    });

    //Groupes de routes pour les fiches d'état
    Route::prefix('states-sheet')->group(function(){
        Route::get('/', [StateSheetController::class, 'index'])->name('state_sheet.index');
        Route::get('/show/{employe}', [StateSheetController::class, 'show'])->name('state_sheet.show');
    });

    //Groupes de routes pour les configurations de l'application
    Route::prefix('settings')->group(function () {
        Route::get('/', [ConfigurationController::class, 'index'])->name('settings.index');
        Route::get('/initialize', [ConfigurationController::class, 'initialize'])->name('settings.initialize');
        Route::get('/reset', [ConfigurationController::class, 'reset'])->name('settings.reset');
        Route::put('/update_enterprise', [ConfigurationController::class, 'update_enterprise'])->name('settings.update_enterprise');
        Route::put('/update_config', [ConfigurationController::class, 'update_config'])->name('settings.update_config');
        Route::put('/update_app', [ConfigurationController::class, 'update_app'])->name('settings.update_app');
    });

    //Route pour les notifications
    Route::get('/notifications', [NotifController::class, 'index'])->name('notifications.index');
});

