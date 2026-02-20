@extends('layouts.app')

@section('content')

<h2 class="mb-4">Registrar Nuevo Vehículo</h2>

<form method="POST"
      action="{{ route('vehiculos.store') }}"
      enctype="multipart/form-data">

    @csrf


    {{-- marca --}}
    <div class="mb-3">

        <label class="form-label">Marca</label>

        <input type="text"
               name="marca"
               class="form-control"
               required>

    </div>


    {{-- modelo --}}
    <div class="mb-3">

        <label class="form-label">Modelo</label>

        <input type="text"
               name="modelo"
               class="form-control"
               required>

    </div>


    {{-- año --}}
    <div class="mb-3">

        <label class="form-label">Año</label>

        <input type="number"
               name="anio"
               class="form-control"
               required>

    </div>


    {{-- precio --}}
    <div class="mb-3">

        <label class="form-label">Precio por día</label>

        <input type="number"
               name="precio_dia"
               class="form-control"
               required>

    </div>


    {{-- tipo --}}
    <div class="mb-3">

        <label class="form-label">Tipo de vehículo</label>

        <select name="tipo"
                class="form-control"
                required>

            <option value="">Seleccione</option>

            <option>Sedán</option>

            <option>Hatchback</option>

            <option>SUV</option>

            <option>Camioneta 4x4</option>

            <option>Pickup</option>

        </select>

    </div>


    {{-- transmision --}}
    <div class="mb-3">

        <label class="form-label">Transmisión</label>

        <select name="transmision"
                class="form-control"
                required>

            <option value="">Seleccione</option>

            <option>Automática</option>

            <option>Mecánica</option>

        </select>

    </div>


    {{-- pasajeros --}}
    <div class="mb-3">

        <label class="form-label">Cantidad de pasajeros</label>

        <input type="number"
               name="pasajeros"
               class="form-control"
               required>

    </div>


    {{-- aire acondicionado --}}
    <div class="mb-3">

        <label class="form-label">Aire acondicionado</label>

        <select name="aire_acondicionado"
                class="form-control"
                required>

            <option value="1">Sí</option>

            <option value="0">No</option>

        </select>

    </div>


    {{-- descripcion --}}
    <div class="mb-3">

        <label class="form-label">Descripción</label>

        <textarea name="descripcion"
                  class="form-control"
                  rows="3"></textarea>

    </div>


    {{-- imagen --}}
    <div class="mb-3">

        <label class="form-label">Imagen del vehículo</label>

        <input type="file"
               name="imagen"
               class="form-control">

    </div>


    {{-- boton --}}
    <button class="btn btn-success">

        Registrar Vehículo

    </button>


</form>

@endsection