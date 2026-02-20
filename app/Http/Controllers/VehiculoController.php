<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VehiculoController extends Controller
{

    
    // CATALOGO PUBLICO
    // buscador filtros
    
    public function catalogo(Request $request)
    {
        $query = Vehiculo::whereNull('deleted_at');

        // buscar por marca o modelo
        if ($request->buscar)
        {
            $query->where(function($q) use ($request) {

                $q->where('marca', 'like', '%'.$request->buscar.'%')
                  ->orWhere('modelo', 'like', '%'.$request->buscar.'%');

            });
        }

        // filtrar por tipo
        if ($request->tipo)
        {
            $query->where('tipo', $request->tipo);
        }

        // filtrar por transmision
        if ($request->transmision)
        {
            $query->where('transmision', $request->transmision);
        }

        $vehiculos = $query->get();

        return view('catalogo.index', compact('vehiculos'));
    }


    
    // CATALOGO ADMIN
    
    public function index()
    {
        $vehiculos = Vehiculo::all();

        return view('vehiculos.index', compact('vehiculos'));
    }


    
    // FORMULARIO CREAR
    
    public function create()
    {
        if (!session()->has('admin'))
        {
            return redirect()->route('login');
        }

        return view('vehiculos.create');
    }


    
    // GUARDAR VEHICULO
    
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|integer',
            'precio_dia' => 'required|numeric',
            'descripcion' => 'nullable',
            'transmision' => 'nullable',
            'pasajeros' => 'nullable|integer',
            'tipo' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        // guardar imagen
        $nombreImagen = null;

        if ($request->hasFile('imagen'))
        {
            $nombreImagen = time().'.'.$request->imagen->extension();

            $request->imagen->move(
                public_path('images/vehiculos'),
                $nombreImagen
            );
        }


        // guardar en base de datos
        Vehiculo::create([

            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'precio_dia' => $request->precio_dia,
            'descripcion' => $request->descripcion,
            'transmision' => $request->transmision,
            'pasajeros' => $request->pasajeros,
            'tipo' => $request->tipo,
            'aire_acondicionado' => $request->has('aire_acondicionado'),
            'imagen' => $nombreImagen,
            'estado' => 'disponible'

        ]);


        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente');
    }


    
    // EDITAR VEHICULO
    
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        return view('vehiculos.edit', compact('vehiculo'));
    }


    
    // ACTUALIZAR VEHICULO
    
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'precio_dia' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'tipo' => 'nullable|string',
            'transmision' => 'nullable|string',
            'pasajeros' => 'nullable|integer',
            'aire_acondicionado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        // actualizar imagen si sube nueva
        if ($request->hasFile('imagen'))
        {
            if ($vehiculo->imagen &&
                File::exists(public_path('images/vehiculos/'.$vehiculo->imagen)))
            {
                File::delete(public_path('images/vehiculos/'.$vehiculo->imagen));
            }

            $imagen = time().'.'.$request->imagen->extension();

            $request->imagen->move(
                public_path('images/vehiculos'),
                $imagen
            );

            $vehiculo->imagen = $imagen;
        }


        // actualizar datos
        $vehiculo->update([

            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'precio_dia' => $request->precio_dia,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'transmision' => $request->transmision,
            'pasajeros' => $request->pasajeros,
            'aire_acondicionado' => (bool)$request->aire_acondicionado

        ]);


        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente');
    }


    
    // ELIMINAR VEHICULO 
    
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $vehiculo->delete();

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado correctamente');
    }


    
    // VER PAPELERA
    
    public function papelera()
    {
        $vehiculos = Vehiculo::onlyTrashed()->get();

        return view('vehiculos.papelera', compact('vehiculos'));
    }


    
    // RESTAURAR VEHICULO
    
    public function restaurar($id)
    {
        $vehiculo = Vehiculo::onlyTrashed()->findOrFail($id);

        $vehiculo->restore();

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo restaurado correctamente');
    }

}
