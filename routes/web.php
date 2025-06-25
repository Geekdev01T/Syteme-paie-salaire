<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginEmployeController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\StateDelayController;
use App\Http\Controllers\StateSheetController;
// use App\Http\Middleware\IsAdmin;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





//Routes securisées

//seulement lorsque l'utilisateur est deconnecter
Route::middleware('guest')->group(
    function () {
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/', [LoginController::class, 'handlelogin'])->name('login');
        //Route pour valider le compte admin
        //Cette route est accessible uniquement aux admins
        Route::get('/validate-account/{email}', [AdminController::class, 'defineAccess'])->name('validate-account');
        Route::post('/validate-account', [AdminController::class, 'submitDefineAccess'])->name('validate-account');
        Route::get('/reset-password/{email}', [AdminController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password', [AdminController::class, 'submitresetPassword'])->name('reset-password.submit');
    }
);

//seulement lorsque l'utilisateur est connecter
Route::middleware('auth')->group(function () {

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
        Route::post('/store-course/{employer}', [EmployerController::class, 'storecourse'])->name('employer.storecourse');
        Route::delete('/delete-course/{employer}', [EmployerController::class, 'deletecourse'])->name('employer.deletecourse');
        Route::post('/store-class/{employer}', [EmployerController::class, 'storeclass'])->name('employer.storeclass');
        Route::delete('/delete-class/{employer}', [EmployerController::class, 'deleteclass'])->name('employer.deleteclass');
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

    //Groupes de routes pour les cours
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('course.index');
        Route::get('/create', [CourseController::class, 'create'])->name('course.create');
        Route::post('/create', [CourseController::class, 'store'])->name('course.store');
        Route::delete('/{course}', [CourseController::class, 'delete'])->name('course.delete');
        Route::get('/show/{course}', [CourseController::class, 'show'])->name('course.show');
        Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('/update/{course}', [CourseController::class, 'update'])->name('course.update');
    });

    //Groupes de routes pour les classes
    Route::prefix('classes')->group(function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::get('/create', [ClassController::class, 'create'])->name('class.create');
        Route::post('/create', [ClassController::class, 'store'])->name('class.store');
        Route::delete('/{class}', [ClassController::class, 'delete'])->name('class.delete');
        Route::get('/show/{class}', [ClassController::class, 'show'])->name('class.show');
        Route::get('/edit/{class}', [ClassController::class, 'edit'])->name('class.edit');
        Route::put('/update/{class}', [ClassController::class, 'update'])->name('class.update');
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
    Route::prefix('states-sheet')->group(function () {
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

    // dd(Auth::user());

    // if(Auth::user()->role !== 'admin') {
    //Groupes de routes pour les admins
    // Route::middleware(IsAdmin::class)->prefix('admins')->group(function(){
        Route::prefix('admins')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
            Route::post('/create', [AdminController::class, 'store'])->name('admin.store');
            Route::delete('/{user}', [AdminController::class, 'delete'])->name('admin.delete');
            Route::get('/show/{user}', [AdminController::class, 'show'])->name('admin.show');
            Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
            Route::put('/update/{user}', [AdminController::class, 'update'])->name('admin.update');
        });
    // });

    // }

});


//Routes pour les pointages des employes

Route::get('/verify-employe', [LoginEmployeController::class, 'verifyEmp'])->name('verify.employe');
Route::post('/verify-employe', [LoginEmployeController::class, 'handleVerifyEmp'])->name('verify.employe');
Route::get('/logout-employe', [LoginEmployeController::class, 'logoutEmp'])->name('logout.employe');

//Routes pour la connexion des employes
Route::get('/login-employe', [LoginEmployeController::class, 'loginEmp'])->name('login.employe');
Route::post('/login-employe', [LoginEmployeController::class, 'handlelogin'])->name('login.employe');
Route::get('/initialize-employe', [LoginEmployeController::class, 'initEmp'])->name('init.employe');
Route::post('/initialize-employe', [LoginEmployeController::class, 'handleInitEmp'])->name('init.employe');



