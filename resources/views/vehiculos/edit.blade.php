@extends('layouts.app')

@section('content')

<h2 class="mb-4">Editar Vehículo</h2>

<form method="POST"
      action="{{ route('vehiculos.update', $vehiculo->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- marca --}}
    <div class="mb-3">
        <label class="form-label">Marca</label>

        <input type="text"
               name="marca"
               class="form-control"
               value="{{ $vehiculo->marca }}"
               required>
    </div>


    {{-- modelo --}}
    <div class="mb-3">
        <label class="form-label">Modelo</label>

        <input type="text"
               name="modelo"
               class="form-control"
               value="{{ $vehiculo->modelo }}"
               required>
    </div>


    {{-- año --}}
    <div class="mb-3">
        <label class="form-label">Año</label>

        <input type="number"
               name="anio"
               class="form-control"
               value="{{ $vehiculo->anio }}"
               required>
    </div>


    {{-- precio --}}
    <div class="mb-3">
        <label class="form-label">Precio por día</label>

        <input type="number"
               name="precio_dia"
               class="form-control"
               value="{{ $vehiculo->precio_dia }}"
               required>
    </div>


    {{-- descripcion --}}
    <div class="mb-3">
        <label class="form-label">Descripción</label>

        <textarea name="descripcion"
                  class="form-control"
                  rows="3">{{ $vehiculo->descripcion }}</textarea>
    </div>


    {{-- tipo --}}
    <div class="mb-3">
        <label class="form-label">Tipo</label>

        <select name="tipo"
                class="form-control">

            <option value="">Seleccione</option>

            <option value="Sedán"
                {{ $vehiculo->tipo == 'Sedán' ? 'selected' : '' }}>
                Sedán
            </option>

            <option value="Hatchback"
                {{ $vehiculo->tipo == 'Hatchback' ? 'selected' : '' }}>
                Hatchback
            </option>

            <option value="SUV"
                {{ $vehiculo->tipo == 'SUV' ? 'selected' : '' }}>
                SUV
            </option>

            <option value="4x4"
                {{ $vehiculo->tipo == '4x4' ? 'selected' : '' }}>
                4x4
            </option>

        </select>
    </div>


    {{-- transmision --}}
    <div class="mb-3">
        <label class="form-label">Transmisión</label>

        <select name="transmision"
                class="form-control">

            <option value="">Seleccione</option>

            <option value="Manual"
                {{ $vehiculo->transmision == 'Manual' ? 'selected' : '' }}>
                Manual
            </option>

            <option value="Automática"
                {{ $vehiculo->transmision == 'Automática' ? 'selected' : '' }}>
                Automática
            </option>

        </select>
    </div>


    {{-- pasajeros --}}
    <div class="mb-3">
        <label class="form-label">Pasajeros</label>

        <input type="number"
               name="pasajeros"
               class="form-control"
               value="{{ $vehiculo->pasajeros }}">
    </div>


    {{-- aire acondicionado --}}
    <div class="mb-3">

        <label class="form-label">Aire acondicionado</label>

        <select name="aire_acondicionado"
                class="form-control">

            <option value="1"
                {{ $vehiculo->aire_acondicionado ? 'selected' : '' }}>
                Sí
            </option>

            <option value="0"
                {{ !$vehiculo->aire_acondicionado ? 'selected' : '' }}>
                No
            </option>

        </select>

    </div>


    {{-- imagen actual --}}
    <div class="mb-3">

        <label class="form-label">Imagen actual</label>

        <br>

        <img src="{{ asset('images/vehiculos/' . $vehiculo->imagen) }}"
             width="250"
             class="mb-2">

    </div>


    {{-- nueva imagen --}}
    <div class="mb-3">

        <label class="form-label">Cambiar imagen</label>

        <input type="file"
               name="imagen"
               class="form-control">

    </div>


    <button class="btn btn-primary">
        Actualizar Vehículo
    </button>

</form>

@endsection