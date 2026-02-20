<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('admin')) {

            return redirect()->route('login')
                ->with('error', 'Debe iniciar sesión');

        }

        return $next($request);
    }
}