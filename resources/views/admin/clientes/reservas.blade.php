@extends('layouts.app')

@section('content')

<h2 class="mb-4">

Reservas de {{ $cliente->name }}

</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Vehículo</th>
<th>Fecha inicio</th>
<th>Fecha fin</th>
<th>Total</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

@foreach($reservas as $reserva)

<tr>

<td>{{ $reserva->id }}</td>

<td>
{{ $reserva->vehiculo->marca }}
{{ $reserva->vehiculo->modelo }}
</td>

<td>{{ $reserva->fecha_inicio }}</td>

<td>{{ $reserva->fecha_fin }}</td>

<td>${{ number_format($reserva->total,0,',','.') }}</td>

<td>{{ $reserva->estado }}</td>

</tr>

@endforeach

</tbody>

</table>

@endsection
