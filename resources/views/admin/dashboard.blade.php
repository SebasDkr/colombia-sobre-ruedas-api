@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Cuenta Administrador</h2>

    <div class="row">

        {{-- AGREGAR VEHÍCULO AL CATÁLOGO --}}
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow">

                <h5>Agregar vehículo al catálogo</h5>

                <a href="{{ route('vehiculos.create') }}"
                   class="btn btn-success">

                    Registrar nuevo vehículo

                </a>

            </div>
        </div>


        {{-- GESTIONAR CATÁLOGO --}}
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow">

                <h5>Gestionar catálogo</h5>

                <a href="{{ route('vehiculos.index') }}"
                   class="btn btn-primary">

                    Ver catálogo

                </a>

            </div>
        </div>


        {{-- VER RESERVAS --}}
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow">

                <h5>Gestionar reservas</h5>

                <a href="{{ route('reservas.index') }}"
                   class="btn btn-warning">

                    Ver historial de reservas

                </a>

            </div>
        </div>


        {{-- PAPELERA --}}
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow">

                <h5>Papelera de reciclaje</h5>

                <a href="{{ route('vehiculos.papelera') }}"
                   class="btn btn-danger">

                    Ver vehículos eliminados

                </a>

            </div>
        </div>

        <div class="col-md-4 mb-3">

<div class="card p-3 shadow">

<h5>Usuarios</h5>

<a href="{{ route('usuarios.index') }}"
   class="btn btn-info">

Gestionar Usuarios

</a>

</div>

</div>



        {{-- CERRAR SESIÓN --}}
        <div class="col-md-4 mb-3">
            <div class="card p-3 shadow">

                <h5>Sesión administrador</h5>

                <a href="{{ route('logout') }}"
                   class="btn btn-dark">

                    Cerrar sesión

                </a>

            </div>
        </div>


    </div>

</div>

<div class="col-md-4 mb-3">

<div class="card p-3 shadow">

<h5>Clientes</h5>

<a href="{{ route('admin.clientes') }}"
class="btn btn-info">

Gestionar Clientes

</a>

</div>

</div>


@endsection