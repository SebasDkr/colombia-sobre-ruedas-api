<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;

// usuarios
Route::get('/usuarios', [UserController::class, 'index'])
    ->name('usuarios.index');

Route::get('/usuarios/create', [UserController::class, 'create'])
    ->name('usuarios.create');

Route::post('/usuarios', [UserController::class, 'store'])
    ->name('usuarios.store');

Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])
    ->name('usuarios.destroy');




// HOME

Route::get('/', function () {

    return view('home');

})->name('home');




// CATALOGO PUBLICO 

Route::get('/catalogo',

    [VehiculoController::class, 'catalogo']

)->name('catalogo');





// RESERVAS Client

Route::get('/reservas/create/{vehiculo}',

    [ReservaController::class, 'create']

)->name('reservas.create');


Route::post('/reservas',

    [ReservaController::class, 'store']

)->name('reservas.store');





// LOGIN ADMIN

Route::get('/login',

    [AuthController::class, 'showLogin']

)->name('login');


Route::post('/login',

    [AuthController::class, 'login']

);


Route::get('/logout',

    [AuthController::class, 'logout']

)->name('logout');





// PANEL ADMIN

Route::get('/admin', function () {

    if (!session()->has('admin')) {

        return redirect()->route('login');

    }

    return view('admin.dashboard');

})->name('admin.dashboard');





// VEHICULOS SOLO ADMIN

Route::get('/vehiculos',

    [VehiculoController::class, 'index']

)->name('vehiculos.index');


Route::get('/vehiculos/create',

    [VehiculoController::class, 'create']

)->name('vehiculos.create');


Route::post('/vehiculos',

    [VehiculoController::class, 'store']

)->name('vehiculos.store');


Route::get('/vehiculos/{id}/edit',

    [VehiculoController::class, 'edit']

)->name('vehiculos.edit');


Route::put('/vehiculos/{id}',

    [VehiculoController::class, 'update']

)->name('vehiculos.update');


Route::delete('/vehiculos/{id}',

    [VehiculoController::class, 'destroy']

)->name('vehiculos.destroy');





// PAPELERA ADMIN

Route::get('/vehiculos/papelera',

    [VehiculoController::class, 'papelera']

)->name('vehiculos.papelera');


Route::put('/vehiculos/{id}/restaurar',

    [VehiculoController::class, 'restaurar']

)->name('vehiculos.restaurar');




//RESERVAS ADMIN (VER / FINALIZAR)

Route::get('/reservas',

    [ReservaController::class, 'index']

)->name('reservas.index');


Route::put('/reservas/{reserva}/finalizar',

    [ReservaController::class, 'finalizar']

)->name('reservas.finalizar');

Route::get('/usuarios/{id}/edit',
    [UserController::class,'edit'])
    ->name('usuarios.edit');

Route::put('/usuarios/{id}',
    [UserController::class,'update'])
    ->name('usuarios.update');

    use App\Http\Controllers\AuthClienteController;

// REGISTRO CLIENTE
Route::get('/registro', [AuthClienteController::class, 'showRegistro'])
    ->name('cliente.registro');

Route::post('/registro', [AuthClienteController::class, 'registro']);


// LOGIN CLIENTE
Route::get('/login-cliente', [AuthClienteController::class, 'showLogin'])
    ->name('cliente.login');

Route::post('/login-cliente', [AuthClienteController::class, 'login']);


// LOGOUT CLIENTE
Route::get('/logout-cliente', [AuthClienteController::class, 'logout'])
    ->name('cliente.logout');

  // panel cliente
Route::get('/cliente/panel',
    [App\Http\Controllers\AuthClienteController::class, 'panel'])
    ->name('cliente.panel');

// cancelar reserva cliente
Route::put('/cliente/reserva/{id}/cancelar',
    [App\Http\Controllers\ReservaController::class, 'cancelarCliente'])
    ->name('cliente.cancelar');

// ver clientes
Route::get('/admin/clientes',
    [ClienteController::class, 'index'])
    ->middleware('admin')
    ->name('admin.clientes');


// ver reservas de un cliente
Route::get('/admin/clientes/{id}/reservas',
    [ClienteController::class, 'reservas'])
    ->middleware('admin')
    ->name('admin.clientes.reservas');


// eliminar cliente
Route::delete('/admin/clientes/{id}',
    [ClienteController::class, 'destroy'])
    ->middleware('admin')
    ->name('admin.clientes.eliminar');

    // recuperar contraseña cliente
Route::get('/recuperar-cliente',
    [AuthClienteController::class, 'showRecuperar'])
    ->name('cliente.recuperar.form');

Route::post('/recuperar-cliente',
    [AuthClienteController::class, 'recuperar'])
    ->name('cliente.recuperar');

    // pagina nosotros
Route::get('/nosotros', function () {

    return view('nosotros');

})->name('nosotros');


// pagina contacto
Route::get('/contacto', function () {

    return view('contacto');

})->name('contacto');




