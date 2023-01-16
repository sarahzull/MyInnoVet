<?php

use App\Http\Controllers\PatientsController;
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
    Route::get('/edit/{id}', [PatientsController::class, 'edit'])->name('patients.edit');

    // Route::middleware('can:isAdmin')->group(function () {
    //     Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    //     Route::post('/', [StudentsController::class, 'store'])->name('students.store');
    //     Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('students.edit');
    //     Route::patch('/{id}', [StudentsController::class, 'update'])->name('students.update');
    //     Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
    // });
});
