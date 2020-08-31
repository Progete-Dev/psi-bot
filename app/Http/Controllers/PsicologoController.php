<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PsicologoController extends Controller
{
    public function perfil(Request $request){
        return view('psicologo.perfil.index');
    }

    public function agenda(Request $request){
        return view('psicologo.agenda.index');
    }

    public function horarios(){
        return view('psicologo.horario.index');
    }

    public function atendimentos(){
        return view('psicologo.atendimento.index');
    }
    public function viewAtendimento($id){
        return view('psicologo.atendimento.view',[
            'atendimento' => $id
        ]);
    }

    public function clientes(){
        return view('psicologo.cliente.index');
    }
    public function viewCliente($id){
        return view('psicologo.cliente.view',[
            'cliente' => $id
        ]);
    }

}
