@extends('layouts.app')

@section('content')

<h2 class="mb-4">Gestión de Clientes</h2>

<table class="table table-bordered">

<thead class="table-dark">
<tr>

<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Acciones</th>

</tr>
</thead>

<tbody>

@foreach($clientes as $cliente)

<tr>

<td>{{ $cliente->id }}</td>

<td>{{ $cliente->name }}</td>

<td>{{ $cliente->email }}</td>

<td>

{{-- ver reservas --}}
<a href="{{ route('admin.clientes.reservas', $cliente->id) }}"
class="btn btn-info btn-sm">

Ver Reservas

</a>


{{-- eliminar cliente --}}
<form action="{{ route('admin.clientes.eliminar', $cliente->id) }}"
method="POST"
style="display:inline;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar cliente?')">

Eliminar

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection
