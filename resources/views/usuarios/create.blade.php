@extends('layouts.app')

@section('content')

<h2 class="mb-4">Crear Usuario</h2>

<form method="POST"
      action="{{ route('usuarios.store') }}">

@csrf


<div class="mb-3">

<label>Nombre</label>

<input type="text"
       name="name"
       class="form-control"
       required>

</div>


<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control"
       required>

</div>


<div class="mb-3">

<label>Password</label>

<input type="password"
       name="password"
       class="form-control"
       required>

</div>


<button class="btn btn-success">

Crear Usuario

</button>

</form>

@endsection
