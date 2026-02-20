@extends('layouts.app')

@section('content')

{{-- HERO / PORTADA --}}
<div class="bg-dark text-white rounded p-5 mb-4"
     style="
        background-image: url('{{ asset('images/banner.jpg') }}');
        background-size: cover;
        background-position: center;
        min-height: 350px;
        display: flex;
        align-items: center;
     ">

    <div class="container text-center">

        {{-- titulo principal --}}
        <h1 class="display-5 fw-bold">

            Colombia Sobre Ruedas Rent a Car

        </h1>

        {{-- subtitulo --}}
        <p class="lead">

            Alquiler de vehículos en Cartago, Pereira y toda la región

        </p>

        {{-- boton catalogo --}}
        <a href="{{ route('catalogo') }}"
           class="btn btn-warning btn-lg mt-3">

            Ver Catálogo

        </a>

    </div>

</div>



{{-- SERVICIOS --}}
<div class="container">

    <h2 class="text-center mb-4">

        Nuestros Servicios

    </h2>


    <div class="row text-center">


        {{-- asistencia --}}
        <div class="col-md-4 mb-4">

            <div class="card shadow h-100 p-3">

                <h5>Asistencia 24 Horas</h5>

                <p>

                    Atención permanente para todos nuestros clientes.

                </p>

            </div>

        </div>


        {{-- kilometraje --}}
        <div class="col-md-4 mb-4">

            <div class="card shadow h-100 p-3">

                <h5>Kilometraje Libre en el Eje Cafetero</h5>

                <p>

                    Viaja sin límites en nuestros vehículos.

                </p>

            </div>

        </div>


        {{-- vehiculos --}}
        <div class="col-md-4 mb-4">

            <div class="card shadow h-100 p-3">

                <h5>Vehículos modernos</h5>

                <p>

                    Automóviles y camionetas de 5 a 7 pasajeros.

                </p>

            </div>

        </div>


    </div>

</div>



{{-- VEHICULOS DESTACADOS --}}
<div class="container mt-5">

    <h2 class="text-center mb-4">

        Vehículos disponibles

    </h2>


    <div class="row">

        @foreach(\App\Models\Vehiculo::where('estado','disponible')->take(3)->get() as $vehiculo)

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                {{-- imagen --}}
                <img src="{{ $vehiculo->imagen
                    ? asset('images/vehiculos/'.$vehiculo->imagen)
                    : asset('images/vehiculo-default.jpg') }}"
                     class="card-img-top"
                     style="height:200px;object-fit:cover;">


                <div class="card-body text-center">

                    {{-- nombre --}}
                    <h5>

                        {{ $vehiculo->marca }} {{ $vehiculo->modelo }}

                    </h5>


                    {{-- precio --}}
                    <p>

                        ${{ number_format($vehiculo->precio_dia,0,',','.') }} / día

                    </p>


                    {{-- boton --}}
                    <a href="{{ route('catalogo') }}"
                       class="btn btn-primary">

                        Ver detalles

                    </a>


                </div>

            </div>

        </div>

        @endforeach


    </div>

</div>



{{-- CTA --}}
<div class="container mt-5">

    <div class="bg-warning rounded p-4 text-center shadow">

        <h4>

            Reserva tu vehículo hoy mismo

        </h4>

        <a href="{{ route('catalogo') }}"
           class="btn btn-dark mt-2">

            Ir al catálogo

        </a>

    </div>

</div>


@endsection
