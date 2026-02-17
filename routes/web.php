<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VitalsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers',  [PatientController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [PatientController::class, 'create'])->name('customers.create');
Route::post('/customers/create',  [PatientController::class, 'store'])->name('customers.store');

Route::get('/customers/{id}', [PatientController::class, 'show'])->name('customers.show');
Route::put('/customers/{id}', [PatientController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [PatientController::class, 'destroy'])->name('customers.destroy');

Route::get('/customers/{id}/edit', [PatientController::class, 'edit'])->name('customers.edit');
Route::post('/customers/{id}/edit', [PatientController::class, 'storeupdate'])->name('customers.edit.store');

Route::get('/customers/{id}/visit', [PatientController::class, 'createVisit'])->name('customers.visit.create');
Route::post('/customers/{id}/visit', [PatientController::class, 'visit'])->name('customers.visit.store');
Route::get('/customers/{id}/meetings', [PatientController::class, 'meetings'])->name('customers.meetings');

Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');

//Route::get('/vitals/create', [VitalsController::class, 'create'])->name('vitals.create');
//Route::post('/vitals/create', [VitalsController::class, 'store'])->name('vitals.store');

Route::get('/visits/{visit}/vitals/create', [VitalsController::class, 'create'])->name('vitals.create');
Route::post('/visits/{visit}/vitals', [VitalsController::class, 'store'])->name('vitals.store');
