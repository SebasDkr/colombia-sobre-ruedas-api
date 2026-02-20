@extends('layouts.app')

@section('content')

<h2 class="mb-4">Recuperar contraseña</h2>

{{-- formulario para recuperar contraseña --}}
<form method="POST" action="{{ route('cliente.recuperar') }}">

    @csrf

    {{-- email --}}
    <div class="mb-3">
        <label>Email registrado</label>

        <input type="email"
               name="email"
               class="form-control"
               required>
    </div>

    {{-- nueva contraseña --}}
    <div class="mb-3">
        <label>Nueva contraseña</label>

        <input type="password"
               name="password"
               class="form-control"
               required>
    </div>

    {{-- boton --}}
    <button class="btn btn-primary">
        Cambiar contraseña
    </button>

</form>

@endsection
