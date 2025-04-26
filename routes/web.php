<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResponsiblesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

  Route::controller(UserController::class)
    ->group(function () {
      Route::get('/', 'index')->name('dashboard');
      Route::get('{user}/user', 'show')->name('users.show');
    });

  Route::resource('responsibles', ResponsiblesController::class);
  Route::resource('patients', PatientController::class);
  Route::resource('medications', MedicationController::class);
  Route::resource('activities', ActivityController::class);
  Route::resource('diseases', DiseaseController::class);

  Route::controller(PermissionController::class)
    ->prefix('permissions')
    ->name('permissions.')
    ->group(function () {
      Route::get('/', 'index')->name('index');
    });

});