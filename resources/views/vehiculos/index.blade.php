@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Nuestro Catalogo de Vehículos</h2>

    {{-- solo el admin puede registrar vehiculos --}}
    @if(session()->has('admin'))

        <a href="{{ route('vehiculos.create') }}"
           class="btn btn-success">

            Registrar nuevo vehículo

        </a>

    @endif

</div>


<div class="row">

@forelse ($vehiculos as $vehiculo)

    <div class="col-md-4 mb-4">

        <div class="card h-100 shadow-sm">


            {{-- imagen del vehiculo --}}
            <img 
                src="{{ $vehiculo->imagen 
                        ? asset('images/vehiculos/' . $vehiculo->imagen) 
                        : asset('images/vehiculo-default.jpg') }}"
                class="card-img-top"
                alt="{{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                style="height: 200px; object-fit: cover;"
            >


            <div class="card-body">


                {{-- nombre --}}
                <h5 class="card-title">

                    {{ $vehiculo->marca }} {{ $vehiculo->modelo }}

                </h5>


                {{-- año --}}
                <p class="mb-1">

                    Año: {{ $vehiculo->anio }}

                </p>


                {{-- precio --}}
                <p class="mb-1">

                    Precio por día:
                    ${{ number_format($vehiculo->precio_dia,0,',','.') }}

                </p>


                {{-- descripcion --}}
                @if($vehiculo->descripcion)

                    <p class="mb-2">

                        {{ $vehiculo->descripcion }}

                    </p>

                @endif


                {{-- detalles --}}
                <p class="mb-1">

                    Tipo: {{ $vehiculo->tipo ?? 'No especificado' }}

                </p>


                <p class="mb-1">

                    Transmisión: {{ $vehiculo->transmision ?? 'No especificado' }}

                </p>


                <p class="mb-1">

                    Pasajeros: {{ $vehiculo->pasajeros ?? 'No especificado' }}

                </p>


                <p class="mb-2">

                    Aire acondicionado:
                    {{ $vehiculo->aire_acondicionado ? 'Sí' : 'No' }}

                </p>


                {{-- estado --}}
                @if ($vehiculo->estado === 'disponible')

                    <span class="badge bg-success mb-2 d-block">

                        Disponible

                    </span>


                    {{-- boton reservar visible para todos --}}
                    <a href="{{ route('reservas.create', $vehiculo->id) }}"
                       class="btn btn-primary w-100 mb-2">

                        Reservar

                    </a>


                @else

                    <span class="badge bg-danger mb-2 d-block">

                        No disponible

                    </span>

                @endif



                {{-- botones solo admin --}}
                @if(session()->has('admin'))


                    {{-- editar --}}
                    <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                       class="btn btn-warning w-100 mb-2">

                        Editar

                    </a>



                    {{-- eliminar --}}
                    <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')


                        <button class="btn btn-danger w-100"
                                onclick="return confirm('¿Eliminar este vehículo?')">

                            Eliminar

                        </button>

                    </form>


                @endif


            </div>

        </div>

    </div>

@empty

    <div class="col-12 text-center">

        <p>No hay vehículos disponibles</p>

    </div>

@endforelse

</div>

@endsection