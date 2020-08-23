<?php

namespace App\Http\Controllers;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsicologoController extends Controller
{
    public function perfil(Request $request){
        return view('psicologo.perfil.index');
    }

    public function agenda(Request $request){
        $date = now()->startOfMonth();
        $atendimentos = Evento::paraPsicologo(Auth::user()->id)
            ->withEventosSince($date)
            ->with('cliente')
            ->get();
        $solicitacoes = Agendamento::paraPsicologo(Auth::user()->id)
            ->withAgendamentosSince($date)
            ->where('status','<',Agendamento::AGENDADO)
            ->with('cliente')
            ->get();
        $events =$atendimentos->mergeRecursive($solicitacoes)->groupBy(function ($event){
            return $event->dia_semana;
        })->toArray();

        return view('psicologo.agenda.index',[
            'atendimentos' => $atendimentos,
            'solicitacoes' => $solicitacoes,
            'events' => $events
        ]);
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
