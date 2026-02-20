@extends('layouts.app')

@section('content')

<h2 class="mb-4">Gestión de Usuarios</h2>

<a href="{{ route('usuarios.create') }}"
   class="btn btn-success mb-3">

   Crear Usuario

</a>


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

@foreach($usuarios as $usuario)

<tr>

<td>{{ $usuario->id }}</td>

<td>{{ $usuario->name }}</td>

<td>{{ $usuario->email }}</td>

<td>

<a href="{{ route('usuarios.edit',$usuario->id) }}"
   class="btn btn-warning btn-sm mb-1">

Restablecer Password

</a>


<form method="POST"
      action="{{ route('usuarios.destroy',$usuario->id) }}">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Eliminar usuario?')">

Eliminar

</button>

</form>

</td>


</tr>

@endforeach

</tbody>

</table>

@endsection
