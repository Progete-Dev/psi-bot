<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\NotificacaoDeAtendimento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsicologoController extends Controller
{
     public function perfil(Request $request){
       
        return view('psicologo.perfil');
    }
    public function mensagens(Request $request){
       
        return view('psicologo.mensagens');
    }
    public function configuracoes(Request $request){
       
        return view('psicologo.configuracoes');
    }
    public function historicoCliente(Request $request, $id){
       
        $usuario = User::find($id);
        if($usuario){
            return view('psicologo.historico', compact("usuario"));
        }
        return redirect('psicologo/historicoList')->with("warning", "Usuario não encontrado.");
    }
    public function historicoList(Request $request){
        $atendimentos = Atendimento::all();
        return view('psicologo.historicoList', compact('atendimentos'));
    }
    public function home(Request $request){
       $notificacoes=NotificacaoDeAtendimento::all();
        return view('psicologo.home', compact('notificacoes'));
    }
    public function calendario(Request $request){
       
        return view('psicologo.calendario');
    }
}
