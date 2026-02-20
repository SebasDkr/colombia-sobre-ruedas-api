@extends('layouts.app')

@section('content')

<h2 class="mb-4">Historial de Reservas</h2>

@if ($reservas->isEmpty())
    <p>No hay reservas registradas.</p>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-hover">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Vehículo</th>
                    <th>Fechas</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Fecha de reserva</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>

                        <td>{{ $reserva->id }}</td>

                        <td>
                            {{ $reserva->vehiculo->marca }}
                            {{ $reserva->vehiculo->modelo }}
                        </td>

                        <td>
                            {{ $reserva->fecha_inicio }} <br>
                            {{ $reserva->fecha_fin }}
                        </td>

                        <td>
                            ${{ number_format($reserva->total, 0, ',', '.') }}
                        </td>

                        <td>
                            @if ($reserva->estado === 'confirmada')
                                <span class="badge bg-success">Confirmada</span>
                            @elseif ($reserva->estado === 'finalizada')
                                <span class="badge bg-secondary">Finalizada</span>
                            @elseif ($reserva->estado === 'cancelada')
                                <span class="badge bg-danger">Cancelada</span>
                            @else
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @endif
                        </td>

                        <td>
                            {{ $reserva->created_at->format('Y-m-d H:i') }}
                        </td>

                        <!-- BOTÓN -->
                        <td>

                            @if ($reserva->estado === 'confirmada')

                                <form action="{{ route('reservas.finalizar', $reserva->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button class="btn btn-warning btn-sm">
                                        Finalizar
                                    </button>

                                </form>

                            @else

                                <span class="text-muted">
                                    Sin acciones
                                </span>

                            @endif

                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endif

@endsection