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
        $filter = [
            Atendimento::AGUARDA_HORARIO,
            Atendimento::CONCLUIDO,
            Atendimento::CANCELADO,
            Atendimento::REMARCADO,
        ];
        if($request->has('filter')){
            $filter = array_map(function($id){
                return intval($id);
            },$request->get('filter'));
        }

        $orderBy = $request->get('orderBy','data_atendimento');
        $order = $request->get('order','ASC');
        $atendimentos = Atendimento::where('psicologo_id',auth()->user()->id)
            ->whereIn('status', $filter)
            ->when($orderBy != '',function($query) use ($orderBy,$order){
                return $query->orderBy($orderBy,$order);
            })->paginate(10)->appends(['filter' => $filter,'orderBy' => $orderBy]);
        return view('psicologo.historicoList', compact('atendimentos','filter','orderBy','order'));
    }
    public function home(Request $request){
        $notificacoes = auth()->user()->notificacoes;
        
        return view('psicologo.home', compact('notificacoes'));
    }
    public function calendario(Request $request){

        $atendimentos = auth()->user()->atendimentos->map(function($atendimento){
            return ['cliente' => $atendimento->cliente,'psicologo' => $atendimento->psicologo,'data_atendimento' => $atendimento->data_atendimento,'tempo_atendimento' => $atendimento->tempo_atendimento,'status' => $atendimento->status];
        });

        
        return view('psicologo.calendario',compact('atendimentos'));
    }


    public function solicitacoes(Request $request){
        $filter = [
            Atendimento::AGUARDA_PSICOLOGO,
        ];
        $orderBy = $request->get('orderBy','created_at');
        $order = $request->get('order','ASC');
        $atendimentos = Atendimento::where('psicologo_id',null)
            ->whereIn('status', $filter)
            ->when($orderBy != '',function($query) use ($orderBy,$order){
                return $query->orderBy($orderBy,$order);
            })->paginate(10)->appends(['filter' => $filter,'orderBy' => $orderBy]);
        return view('psicologo.solicitacoes', compact('atendimentos','filter','orderBy','order'));
    }
}
