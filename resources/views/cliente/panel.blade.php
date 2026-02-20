@extends('layouts.app')

@section('content')

<div class="container">

    {{-- titulo --}}
    <h2 class="mb-4">
        Mi Cuenta
    </h2>


    {{-- mensaje si no hay reservas --}}
    @if($reservas->isEmpty())

        <div class="alert alert-info">

            No tienes reservas todavía

        </div>

    @else


        <table class="table table-bordered">

            <thead class="table-dark">

                <tr>

                    <th>Vehículo</th>

                    <th>Fecha inicio</th>

                    <th>Fecha fin</th>

                    <th>Total</th>

                    <th>Estado</th>

                    <th>Acción</th>

                </tr>

            </thead>


            <tbody>

                @foreach($reservas as $reserva)

                <tr>

                    {{-- vehiculo --}}
                    <td>

                        {{ $reserva->vehiculo->marca }}
                        {{ $reserva->vehiculo->modelo }}

                    </td>


                    {{-- fechas --}}
                    <td>
                        {{ $reserva->fecha_inicio }}
                    </td>

                    <td>
                        {{ $reserva->fecha_fin }}
                    </td>


                    {{-- total --}}
                    <td>

                        ${{ number_format($reserva->total,0,',','.') }}

                    </td>


                    {{-- estado --}}
                    <td>

                        @if($reserva->estado == 'confirmada')

                            <span class="badge bg-success">
                                Confirmada
                            </span>

                        @elseif($reserva->estado == 'finalizada')

                            <span class="badge bg-secondary">
                                Finalizada
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Cancelada
                            </span>

                        @endif

                    </td>


                    {{-- cancelar reserva --}}
                    <td>

                        @if($reserva->estado == 'confirmada')

                            <form method="POST"
                                  action="{{ route('cliente.cancelar', $reserva->id) }}">

                                @csrf
                                @method('PUT')

                                <button class="btn btn-danger btn-sm">

                                    Cancelar

                                </button>

                            </form>

                        @else

                            -

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>


    @endif


</div>

@endsection
