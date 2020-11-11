<?php

namespace App\Http\Controllers;

use App\Facades\TokenLink;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function index($code)
    {

        if(TokenLink::validateTokenLink($code)) {
            $tokenLink = TokenLink::findByToken($code);
            if (auth()->guard('cliente')->user() != null and auth()->guard('cliente')->user()->id != $tokenLink->cliente_id) {
                Auth::guard('cliente')->logout();
                return response('Link Inválido', 403);
            }else{
                Auth::guard('cliente')->loginUsingId($tokenLink->cliente_id);
            }
            return view('paciente.show',['token' => $code]);
        }
        return response('Link Inválido', 403);
    }

    public function chat()
    {
        return view('chat');
    }
}
