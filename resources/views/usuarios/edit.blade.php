@extends('layouts.app')

@section('content')

<h2 class="mb-4">Restablecer Contraseña</h2>

<form method="POST"
      action="{{ route('usuarios.update',$usuario->id) }}">

@csrf
@method('PUT')


<div class="mb-3">

<label>Usuario</label>

<input type="text"
       class="form-control"
       value="{{ $usuario->name }}"
       disabled>

</div>


<div class="mb-3">

<label>Nueva contraseña</label>

<input type="password"
       name="password"
       class="form-control"
       required>

</div>


<button class="btn btn-success">

Actualizar contraseña

</button>

</form>

@endsection
