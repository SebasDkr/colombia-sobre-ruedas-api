@extends('layouts.app')

@section('content')

<h2>Login</h2>

<form method="POST">

@csrf

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button class="btn btn-primary">
Ingresar
</button>

{{-- recuperar contraseña --}}
<a href="{{ route('cliente.recuperar.form') }}">
    ¿Olvidaste tu contraseña?
</a>


</form>

@endsection
