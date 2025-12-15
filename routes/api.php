<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VehiculoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aquí se registran todas las rutas de la API
| Estas rutas usan el prefijo /api automáticamente
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas de Vehículos
Route::get('/vehiculos', [VehiculoController::class, 'index']);
Route::post('/vehiculos', [VehiculoController::class, 'store']);
