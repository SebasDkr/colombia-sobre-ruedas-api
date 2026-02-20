@extends('layouts.app')

@section('content')

<h2 class="mb-4">Reservar vehículo</h2>

<div class="card">
    <div class="card-body">

        <h5 class="card-title mb-3">
            {{ $vehiculo->marca }} {{ $vehiculo->modelo }} ({{ $vehiculo->anio }})
        </h5>

        <p>
            <strong>Precio por día:</strong>
            ${{ number_format($vehiculo->precio_dia, 0, ',', '.') }}
        </p>

        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf

            <!-- ID del vehículo -->
            <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">

            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin</label>
                <input type="date" name="fecha_fin" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Confirmar reserva
            </button>

            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary ms-2">
                Cancelar
            </a>
        </form>

    </div>
</div>

@endsection