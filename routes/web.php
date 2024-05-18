<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TripController;

Route::get('/', function () {
    return view('welcome');
});

////Usa o resource para criar as rotas de CRUD para os controllers

Route::resource('driver', DriverController::class);

Route::resource('vehicle', VehicleController::class);

Route::resource('trip', TripController::class);

