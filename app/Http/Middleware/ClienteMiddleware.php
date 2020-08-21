<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        if($request->has('code')){
            $code = $request->get('code');

        }
        Auth::logout();
        return redirect()->route('login')->with('error','Usuário Inválido');

    }
}
