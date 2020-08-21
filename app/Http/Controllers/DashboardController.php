<?php

namespace App\Http\Controllers;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
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



        return view('admin.dashboard',[
            'atendimentos' => $atendimentos,
            'solicitacoes' => $solicitacoes,
            'events' => $events
        ]);
    }
}
