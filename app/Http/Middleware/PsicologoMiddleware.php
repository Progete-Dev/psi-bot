<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsicologoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->ehpsicologo == true){
            return $next($request);
        }
        Auth::logout();
        return redirect()->route('login')->with('error','Usuário Inválido');
  
    }
}
