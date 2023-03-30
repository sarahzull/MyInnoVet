<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicalRecordsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\StaffsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/error', function () {
    abort(500);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/patients')->middleware(['auth'])->group(function () {
    Route::get('/', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/create', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/{id}', [PatientsController::class, 'show'])->name('patients.show');
    Route::get('/edit/{id}', [PatientsController::class, 'edit'])->name('patients.edit');
    Route::patch('/{id}', [PatientsController::class, 'update'])->name('patients.update');
    Route::delete('/{id}', [PatientsController::class, 'destroy'])->name('patients.destroy');

    // Route::middleware('can:isAdmin')->group(function () {
    //     Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    //     Route::post('/', [StudentsController::class, 'store'])->name('students.store');
    //     Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    //     Route::patch('/{id}', [StudentsController::class, 'update'])->name('students.update');
    //     Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
    // });
});

Route::prefix('/clients')->middleware(['auth'])->group(function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/', [ClientsController::class, 'store'])->name('clients.store');
    Route::get('/{id}', [ClientsController::class, 'show'])->name('clients.show');
    Route::get('/edit/{id}', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::patch('/{id}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');
});

Route::prefix('/staffs')->middleware(['auth'])->group(function () {
    Route::get('/', [StaffsController::class, 'index'])->name('staffs.index');
    Route::get('/create', [StaffsController::class, 'create'])->name('staffs.create');
    Route::post('/', [StaffsController::class, 'store'])->name('staffs.store');
    Route::get('/{id}', [StaffsController::class, 'show'])->name('staffs.show');
    Route::get('/edit/{id}', [StaffsController::class, 'edit'])->name('staffs.edit');
    Route::patch('/{id}', [StaffsController::class, 'update'])->name('staffs.update');
    Route::delete('/{id}', [StaffsController::class, 'destroy'])->name('staffs.destroy');
});

Route::prefix('/medical-records')->middleware(['auth'])->group(function () {
    Route::get('/', [MedicalRecordsController::class, 'index'])->name('medical-records.index');
    Route::get('/create', [MedicalRecordsController::class, 'create'])->name('medical-records.create');
    Route::post('/', [MedicalRecordsController::class, 'store'])->name('medical-records.store');
    Route::get('/{id}', [MedicalRecordsController::class, 'show'])->name('medical-records.show');
    Route::get('/edit/{id}', [MedicalRecordsController::class, 'edit'])->name('medical-records.edit');
    Route::patch('/{id}', [MedicalRecordsController::class, 'update'])->name('medical-records.update');
    Route::delete('/{id}', [MedicalRecordsController::class, 'destroy'])->name('medical-records.destroy');
});

Route::prefix('/calendar')->middleware(['auth'])->group(function () {
    Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
    // Route::get('/create', [ClientsController::class, 'create'])->name('clients.create');
    // Route::post('/', [PatientsController::class, 'store'])->name('patients.store');
    // Route::get('/{id}', [PatientsController::class, 'show'])->name('patients.show');
    // Route::get('/edit/{id}', [PatientsController::class, 'edit'])->name('patients.edit');
});

Route::prefix('/settings')->middleware(['auth'])->group(function () {
    Route::get('/', [SettingsController::class, 'index'])->name('settings.index');

    //Role
    Route::prefix('/roles')->middleware(['can:role_access'])->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('/', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
        Route::patch('/{id}', [RolesController::class, 'update'])->name('roles.update');
        Route::delete('/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
    });

    //Permission
    Route::prefix('/permisisons')->middleware(['can:permission_access'])->group(function () {
        Route::get('/', [PermissionsController::class, 'index'])->name('permissions.index');
        Route::get('/create', [PermissionsController::class, 'create'])->name('permissions.create');
        Route::post('/', [PermissionsController::class, 'store'])->name('permissions.store');
        Route::get('/edit/{id}', [PermissionsController::class, 'edit'])->name('permissions.edit');
        Route::patch('/{id}', [PermissionsController::class, 'update'])->name('permissions.update');
        Route::delete('/{id}', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
    });

    //User
    Route::prefix('/users')->middleware(['can:user_access'])->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{id}', [UsersController::class, 'show'])->name('users.show');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    //Species
    Route::prefix('/species')->middleware(['auth'])->group(function () {
        Route::get('/', [SpeciesController::class, 'index'])->name('species.index');
        Route::get('/create', [SpeciesController::class, 'create'])->name('species.create');
        Route::post('/', [SpeciesController::class, 'store'])->name('species.store');
        Route::get('/edit/{id}', [SpeciesController::class, 'edit'])->name('species.edit');
        Route::patch('/{id}', [SpeciesController::class, 'update'])->name('species.update');
        Route::delete('/{id}', [SpeciesController::class, 'destroy'])->name('species.destroy');
    });
    
});

require __DIR__.'/auth.php';
