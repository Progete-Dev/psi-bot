<?php

namespace App\Http\Livewire\Psicologo\Atendimento;

use App\Services\Psicologo\NovoAtendimentoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RRule\RRule;

class NovoAtendimento extends Component
{
    public $cliente;
    public $horario;
    public $data_inicio;
    public $data_final;
    public $tipo;

    public $open;
    public $horariosDiaSemana;
    public function mount(){
        $this->open = false;
        $this->cliente = null;
        $this->horario = null;
        $this->data_inicio = null;
        $this->data_final = null;
        $this->tipo = null;
        $this->horariosDiaSemana = Auth::user()->horarios()->select('dia_semana')->distinct()
            ->get()
            ->pluck('dia_semana')
            ->reduce(function($atual,$dia_semana){

                $data =["Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                $atual []= $data[$dia_semana];
                return $atual;
            });
    }
    public function openForm(){
        $this->open = true;
    }
    public function closeForm(){
        $this->open = false;
    }

    private function geraRecorrencia($horario,$data_inicio,$data_final){

        if($data_final->isAfter($data_inicio)){
            $count = 0;
            $freq = null;
            $interval = 1;
            if($this->tipo == 7){
                $freq = RRule::WEEKLY;
            }else if($this->tipo == 14){
                $freq = RRule::WEEKLY;
                $interval = 2;
            }
            $rule = [
                'FREQ' => $freq,
                'INTERVAL' => $interval,
                'DTSTART' => $data_inicio,
                'UNTIL' => $data_final,
                'BYDAY' => array_keys(RRule::WEEKDAYS)[$horario->dia_semana],
                "WKST"  => array_keys(RRule::WEEKDAYS)[$horario->dia_semana]
            ];

            return (new RRule($rule))->getRule();
        }
        return null;
    }

    public function novoAtendimento(NovoAtendimentoService $service){
        $data = $this->validate([
            'data_inicio' => 'required',
            'cliente' => 'required|exists:clientes,id',
            'horario' => 'required|exists:horario_psicologos,id',
            'tipo' => 'required|in:-1,7,14',
        ]);

        $horario = Auth::user()->horarios()->find($data['horario']);
        $data_inicio = Carbon::parse($this->data_inicio);

        $data_final = $data_inicio
            ->copy()
            ->hour($horario->hora_final->hour)
            ->minute($horario->hora_final->minute)
            ->second($horario->hora_final->second);
        $recorrencia = [];
        if($data['tipo'] != -1) {
            $data_inicio = $data_inicio->hour($horario->hora_inicio->hour)
                ->minute($horario->hora_inicio->minute)
                ->second($horario->hora_inicio->second);
            $data_final = Carbon::parse($data['data_final'])->hour($horario->hora_final->hour)
                ->minute($horario->hora_final->minute)
                ->second($horario->hora_final->second);

            $recorrencia = $this->geraRecorrencia($horario, $data_inicio, $data_final);
        }
        $service->create([
            'horario_id' => $data['horario'],
            'cliente_id' => $data['cliente'],
            'recorrencia' => $recorrencia,
            'inicio' => $data_inicio,
            'final' => $data_final,
            'google_calendar_id' => ''
        ]);
        session()->flash('success','Novo Atendimento cadastrado com sucesso!');
        $this->redirect("#");
    }

    public function test(){
        $this->dispatchBrowserEvent('open-errors-notification','Test');
    }
    public function render()
    {
        $horarios = [];

        if ($this->data_inicio != null) {
            $data = Carbon::createFromFormat('d/m/Y',$this->data_inicio);
            $horarios = Auth::user()->horarios()->paraDia($data)->get( );
        }
        return view('livewire.psicologo.atendimento.novo-atendimento',['horarios' => $horarios]);
    }

}
