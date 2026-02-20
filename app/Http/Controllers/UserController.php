<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // listar usuarios
    public function index()
    {
        // solo admin
        if (!session()->has('admin')) {
            return redirect()->route('login');
        }

        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }


    // mostrar formulario crear
    public function create()
    {
        if (!session()->has('admin')) {
            return redirect()->route('login');
        }

        return view('usuarios.create');
    }


    // guardar usuario
    public function store(Request $request)
    {
        if (!session()->has('admin')) {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4'
        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password)

        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }


    // eliminar usuario
    public function destroy($id)
    {
        if (!session()->has('admin')) {
            return redirect()->route('login');
        }

        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente');
    }

    // mostrar formulario cambiar password
public function edit($id)
{
    if (!session()->has('admin')) {
        return redirect()->route('login');
    }

    $usuario = User::findOrFail($id);

    return view('usuarios.edit', compact('usuario'));
}

// actualizar password
public function update(Request $request, $id)
{
    if (!session()->has('admin')) {
        return redirect()->route('login');
    }

    $request->validate([
        'password' => 'required|min:4'
    ]);

    $usuario = User::findOrFail($id);

    $usuario->update([
        'password' => Hash::make($request->password)
    ]);

    return redirect()
        ->route('usuarios.index')
        ->with('success', 'Password actualizado correctamente');
}


}
