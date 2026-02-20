<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reserva; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthClienteController extends Controller
{

    // mostrar registro
    public function showRegistro()
    {
        return view('auth.cliente_registro');
    }


    // guardar cliente
    public function registro(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        // crear usuario cliente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // guardar sesion cliente
        Session::put('cliente_id', $user->id);
        Session::put('cliente_nombre', $user->name);

        return redirect()->route('catalogo')
            ->with('success', 'Registro exitoso');
    }


    // mostrar login cliente
    public function showLogin()
    {
        return view('auth.cliente_login');
    }


    // login cliente
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password))
        {
            // guardar sesion cliente
            Session::put('cliente_id', $user->id);
            Session::put('cliente_nombre', $user->name);

            return redirect()->route('catalogo');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }


    // logout cliente
    public function logout()
    {
        Session::forget('cliente_id');
        Session::forget('cliente_nombre');

        return redirect()->route('catalogo');
    }


    
    // PANEL DEL CLIENTE

    public function panel()
    {
        // verificar si el cliente está logueado
        if (!session()->has('cliente_id')) {

            return redirect()
                ->route('cliente.login')
                ->with('error', 'Debe iniciar sesión');

        }

        // obtener reservas del cliente
        $reservas = Reserva::where('user_id', session('cliente_id'))
            ->with('vehiculo')
            ->orderBy('created_at', 'desc')
            ->get();

        // mostrar panel cliente
        return view('cliente.panel', compact('reservas'));
    }

    //
// mostrar formulario recuperar contraseña
//
public function showRecuperar()
{
    return view('auth.cliente_recuperar');
}




// cambiar contraseña

public function recuperar(Request $request)
{
    // validar
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:4'
    ]);

    // buscar usuario
    $user = User::where('email', $request->email)->first();

    if (!$user)
    {
        return back()->with('error', 'Email no encontrado');
    }

    // actualizar contraseña
    $user->password = Hash::make($request->password);

    $user->save();

    return redirect()
        ->route('cliente.login')
        ->with('success', 'Contraseña actualizada correctamente');
}


}
