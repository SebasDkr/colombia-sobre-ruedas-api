<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    // Mostrar formulario de reserva
    public function create($vehiculoId)
    {
        $vehiculo = Vehiculo::findOrFail($vehiculoId);

        return view('reservas.create', compact('vehiculo'));
    }

    // Guardar reserva
    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id'  => 'required|exists:vehiculos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        // Calcular días
        $inicio = Carbon::parse($request->fecha_inicio);
        $fin    = Carbon::parse($request->fecha_fin);

        $dias = $inicio->diffInDays($fin) + 1;

        $total = $dias * $vehiculo->precio_dia;

        Reserva::create([
    'vehiculo_id' => $vehiculo->id,
    'user_id' => session('cliente_id'),
    'fecha_inicio' => $request->fecha_inicio,
    'fecha_fin' => $request->fecha_fin,
    'total' => $total,
    'estado' => 'confirmada'
]);



        // Cambiar estado del vehículo
        $vehiculo->update([
            'estado' => 'no_disponible'
        ]);

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Reserva realizada correctamente');
    }

    // Mostrar historial de reservas
    public function index()
    {
        $reservas = Reserva::with('vehiculo')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reservas.index', compact('reservas'));
    }

    //finalizar reserva
    public function finalizar(Reserva $reserva)
    {
        // Cambiar estado de la reserva
        $reserva->update([
            'estado' => 'finalizada'
        ]);

        // Liberar el vehículo
        $reserva->vehiculo->update([
            'estado' => 'disponible'
        ]);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva finalizada y vehículo disponible nuevamente');
    }

// cancelar reserva desde cliente
public function cancelarCliente($id)
{
    // buscar reserva
    $reserva = Reserva::findOrFail($id);

    // verificar que pertenece al cliente
    if ($reserva->user_id != session('cliente_id')) {

        return redirect()
            ->back()
            ->with('error', 'No autorizado');

    }

    // cambiar estado reserva
    $reserva->estado = 'cancelada';
    $reserva->save();


    // liberar el vehiculo nuevamente
    $vehiculo = Vehiculo::find($reserva->vehiculo_id);

    if ($vehiculo) {

        $vehiculo->estado = 'disponible';
        $vehiculo->save();

    }


    return redirect()
        ->route('cliente.panel')
        ->with('success', 'Reserva cancelada y vehículo disponible nuevamente');
}

}