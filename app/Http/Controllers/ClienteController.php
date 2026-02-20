<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    // mostrar lista de clientes
    public function index()
    {
        // obtener todos los usuarios
        $clientes = User::orderBy('id', 'desc')->get();

        // enviar a la vista
        return view('admin.clientes.index', compact('clientes'));
    }


    // ver reservas de un cliente
    public function reservas($id)
    {
        // buscar cliente
        $cliente = User::findOrFail($id);

        // obtener reservas del cliente
        $reservas = $cliente->reservas()
            ->with('vehiculo')
            ->orderBy('created_at', 'desc')
            ->get();

        // mostrar vista
        return view('admin.clientes.reservas', compact('cliente', 'reservas'));
    }


    // eliminar cliente
    public function destroy($id)
    {
        // buscar cliente
        $cliente = User::findOrFail($id);

        // eliminar cliente
        $cliente->delete();

        return redirect()
            ->route('admin.clientes')
            ->with('success', 'Cliente eliminado correctamente');
    }

}
