@extends('layouts.app')

@section('content')

<h2 class="mb-4">Catalogo de Vehículos</h2>


{{-- buscador de vehiculos --}}
<form method="GET" action="{{ route('catalogo') }}" class="mb-4">

<div class="row">

<div class="col-md-4">

{{-- buscar por marca o modelo --}}
<input type="text"
name="buscar"
class="form-control"
placeholder="Buscar vehículo..."
value="{{ request('buscar') }}">

</div>


<div class="col-md-3">

{{-- filtrar por tipo --}}
<select name="tipo" class="form-control">

<option value="">Tipo</option>

<option value="Sedán" {{ request('tipo') == 'Sedán' ? 'selected' : '' }}>
Sedán
</option>

<option value="Hatchback" {{ request('tipo') == 'Hatchback' ? 'selected' : '' }}>
Hatchback
</option>

<option value="SUV" {{ request('tipo') == 'SUV' ? 'selected' : '' }}>
SUV
</option>

<option value="Camioneta 4x4" {{ request('tipo') == 'Camioneta 4x4' ? 'selected' : '' }}>
Camioneta 4x4
</option>

</select>

</div>


<div class="col-md-3">

{{-- filtrar por transmision --}}
<select name="transmision" class="form-control">

<option value="">Transmisión</option>

<option value="Automático" {{ request('transmision') == 'Automático' ? 'selected' : '' }}>
Automático
</option>

<option value="Manual" {{ request('transmision') == 'Manual' ? 'selected' : '' }}>
Manual
</option>

</select>

</div>


<div class="col-md-2">

<button class="btn btn-primary w-100">

Buscar

</button>

</div>

</div>

</form>



<div class="row">

@foreach($vehiculos as $vehiculo)

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

{{-- imagen --}}
<img src="{{ $vehiculo->imagen 
? asset('images/vehiculos/'.$vehiculo->imagen)
: asset('images/vehiculo-default.jpg') }}"
class="card-img-top"
style="height:200px;object-fit:cover;">


<div class="card-body">

{{-- nombre --}}
<h5>

{{ $vehiculo->marca }} {{ $vehiculo->modelo }}

</h5>


{{-- año --}}
<p class="mb-1">

Año: {{ $vehiculo->anio }}

</p>


{{-- precio --}}
<p class="mb-1">

Precio por día:
${{ number_format($vehiculo->precio_dia,0,',','.') }}

</p>


{{-- descripcion --}}
<p class="mb-2">

{{ $vehiculo->descripcion }}

</p>


{{-- detalles --}}
<p class="mb-1">

Tipo: {{ $vehiculo->tipo ?? 'No especificado' }}

</p>


<p class="mb-1">

Transmisión: {{ $vehiculo->transmision ?? 'No especificado' }}

</p>


<p class="mb-1">

Pasajeros: {{ $vehiculo->pasajeros ?? 'No especificado' }}

</p>


<p class="mb-2">

Aire acondicionado:
{{ $vehiculo->aire_acondicionado ? 'Sí' : 'No' }}

</p>


{{-- estado --}}
@if($vehiculo->estado == 'disponible')

<span class="badge bg-success mb-2 d-block">

Disponible

</span>


{{-- boton reservar --}}
<a href="{{ route('reservas.create',$vehiculo->id) }}"
class="btn btn-primary w-100">

Reservar

</a>


@else

<span class="badge bg-danger d-block">

No disponible

</span>

@endif


</div>
</div>
</div>

@endforeach

</div>

@endsection
