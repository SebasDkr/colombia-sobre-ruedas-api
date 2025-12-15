<?php

use App\Http\Controllers\VehiculoController;

Route::get('/vehiculos', [VehiculoController::class, 'index'])
    ->name('vehiculos.index');

Route::get('/vehiculos/create', [VehiculoController::class, 'create'])
    ->name('vehiculos.create');

Route::post('/vehiculos', [VehiculoController::class, 'store'])
    ->name('vehiculos.store');