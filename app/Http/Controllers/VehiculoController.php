<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    //  INDEX — lista vehículos (VISTA)
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    //  CREATE — formulario (VISTA)
    public function create()
    {
        return view('vehiculos.create');
    }

    //  STORE — guarda vehículo
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'precio_dia' => 'required|numeric'
        ]);

        Vehiculo::create($request->all());

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente');
    }
}
