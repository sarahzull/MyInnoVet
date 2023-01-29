<?php

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/patients')->middleware(['auth'])->group(function () {
    Route::get('/', [PatientsController::class, 'index'])->name('patients.index');
    Route::get('/create', [PatientsController::class, 'create'])->name('patients.create');
    Route::post('/', [PatientsController::class, 'store'])->name('patients.store');
    Route::get('/{id}', [PatientsController::class, 'show'])->name('patients.show');
    Route::get('/edit/{id}', [PatientsController::class, 'edit'])->name('patients.edit');

    // Route::middleware('can:isAdmin')->group(function () {
    //     Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    //     Route::post('/', [StudentsController::class, 'store'])->name('students.store');
    //     Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    //     Route::patch('/{id}', [StudentsController::class, 'update'])->name('students.update');
    //     Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
    // });
});


Route::prefix('/settings')->middleware(['auth'])->group(function () {
    //Role
    Route::prefix('/roles')->group(function () {
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('/', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
        Route::patch('/{id}', [RolesController::class, 'update'])->name('roles.update');
        Route::delete('/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
    });

    //Permission
    Route::prefix('/permisisons')->group(function () {
        Route::get('/', [PermissionsController::class, 'index'])->name('permissions.index');
        Route::get('/create', [PermissionsController::class, 'create'])->name('permissions.create');
        Route::post('/', [PermissionsController::class, 'store'])->name('permissions.store');
        Route::get('/edit/{id}', [PermissionsController::class, 'edit'])->name('permissions.edit');
        Route::patch('/{id}', [PermissionsController::class, 'update'])->name('permissions.update');
        // Route::delete('/{id}', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
    });
});