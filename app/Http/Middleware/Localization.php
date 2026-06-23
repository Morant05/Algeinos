<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          // Verifica la solicitud y determina la localización
          $local = ($request->hasHeader('locale')) ? $request->header('locale') : \App::getLocale();

          // Establece Localizacion
          app()->setLocale($local);

          // Continua solicitud
          return $next($request);
    }
}
