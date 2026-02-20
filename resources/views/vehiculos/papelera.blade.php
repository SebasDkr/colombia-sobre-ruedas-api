@extends('layouts.app')

@section('content')

<h2>Papelera de vehículos</h2>

@if($vehiculos->isEmpty())

<p>No hay vehículos eliminados.</p>

@else

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>

    @foreach($vehiculos as $vehiculo)

    <tr>
        <td>{{ $vehiculo->id }}</td>
        <td>{{ $vehiculo->marca }}</td>
        <td>{{ $vehiculo->modelo }}</td>
        <td>

            <form method="POST"
                  action="{{ route('vehiculos.restaurar', $vehiculo->id) }}">

                @csrf
                @method('PUT')

                <button class="btn btn-success">
                    Restaurar
                </button>

            </form>

        </td>
    </tr>

    @endforeach

    </tbody>
</table>

@endif

@endsection