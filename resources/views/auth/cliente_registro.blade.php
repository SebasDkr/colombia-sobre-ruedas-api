@extends('layouts.app')

@section('content')

<h2>Registro Cliente</h2>

<form method="POST">

@csrf

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<button class="btn btn-success">
Registrarse
</button>

</form>

@endsection
