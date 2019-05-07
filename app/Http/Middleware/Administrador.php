<?php

namespace App\Http\Middleware;

use Closure;

class Administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Auth::user()->tipo != 'admin')
        {
            return redirect()->back()
              ->with(['mensaje' => 'No es posible acceder a esta ubicación debido a los permisos de usuario']);
        }

        return $next($request);
    }
}
