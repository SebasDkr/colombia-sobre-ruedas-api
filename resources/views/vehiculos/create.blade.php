<!DOCTYPE html>
<html>
<head>
    <title>Registrar Vehículo</title>
</head>
<body>

<h1>Registrar Vehículo</h1>

<form method="POST" action="{{ route('vehiculos.store') }}">
    @csrf

    <input type="text" name="marca" placeholder="Marca" required><br>
    <input type="text" name="modelo" placeholder="Modelo" required><br>
    <input type="number" name="anio" placeholder="Año" required><br>
    <input type="number" step="0.01" name="precio_dia" placeholder="Precio por día" required><br>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
