<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vehículos</title>
</head>
<body>

<h1>Listado de Vehículos</h1>

<a href="{{ route('vehiculos.create') }}">Registrar nuevo vehículo</a>

<hr>

<ul>
    @foreach($vehiculos as $vehiculo)
        <li>
            {{ $vehiculo->marca }} -
            {{ $vehiculo->modelo }} -
            {{ $vehiculo->anio }} -
            ${{ $vehiculo->precio_dia }}
        </li>
    @endforeach
</ul>

</body>
</html>
