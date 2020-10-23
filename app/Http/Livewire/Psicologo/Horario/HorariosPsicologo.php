<?php

namespace App\Http\Livewire\Psicologo\Horario;
use App\Models\Psicologo\Horario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HorariosPsicologo extends Component
{
    public $horarios;
    public $diasSemana =  [
        'domingo' => false,
        'segunda' => false,
        'terca' => false,
        'quarta' => false,
        'quinta' => false,
        'sexta' => false,
        'sabado' => false,
    ];
    public $dias =['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'];

    public $horaInicio =0;
    public $minutoInicio=0;
    public $horaFinal=0;
    public $minutoFinal=0;


    public  $horarioId;
    public  $openInfo = false;

    public function mount(){
        $psicologo = Auth::user();
        $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $this->horarios = $psicologo->horarios()->orderBy('dia_semana')->orderBy('hora_inicio')->get()->groupBy(function ($horario) use ($dias){
            return $dias[$horario->dia_semana];
        })->toArray();

        $this->horaInicio = 0;
        $this->minutoInicio = 0;
        $this->horaFinal = 0;
        $this->minutoFinal = 0;

    }

    public function openHorarioInfo($id){
        $this->horarioId = $id;
        $this->openInfo = true;
    }

    public function closeHorarioInfo(){
        $this->openInfo = false;
        $this->horarioId = null;
    }

    public function getHorarioProperty(){
        return Horario::find($this->horarioId)->load(['eventos.cliente','solicitacoes.cliente']);
    }

    public function getDiasSemana(){
        $dias = [
            'domingo' => 0,
            'segunda' => 1,
            'terca' => 2,
            'quarta' => 3,
            'quinta' => 4,
            'sexta' => 5,
            'sabado' => 6,
        ];
        return array_map(function ($dia) use($dias){
            return $dias[$dia];
        },array_keys(array_filter($this->diasSemana,function ($valor){
            return $valor == true;
        })));
    }
    public function novoHorario(){

        $diasSemana = $this->getDiasSemana();
        $this->validate([
            'horaInicio' => 'required|max:23|min:0',
            'minutoInicio' => 'required|min:0|max:59',
            'horaFinal' => 'required|gte:horaInicio',
            'minutoFinal' => 'required|min:0|max:59',
            'diasSemana' => 'array|min:1|max:7',
        ],
            [
                'horaInicio.*' => 'Hora Inicial Inválida',
                'minutoInicio.*' => 'Minuto Inicial Inválido',
                'horaFinal.*'    => 'Hora Final Inválida',
                'minutoFinal.*'  => 'Minuto Final Inválido',
            ]);
        $horaIncio  = Carbon::create(now()->year,now()->month,now()->day,$this->horaInicio,$this->minutoInicio,0);
        $horaFinal  = Carbon::create(now()->year,now()->month,now()->day,$this->horaFinal,$this->minutoFinal,0);
        if(!$horaIncio->isBefore($horaFinal)){
            $this->addError('horaFinal','Hora final deve ser maior que a hora inicial');
            return;
        }
        if(count($diasSemana) == 0){
            $this->addError('diasSemana','Escolha pelo menos um dia da semana');
            return;
        }
        $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $novos = [];
        $conflitos = [];
        foreach ($diasSemana as $diaSemana){
            if(isset($this->horarios[$dias[$diaSemana]])){
                $exists =array_filter($this->horarios[$dias[$diaSemana]],function ($horario) use ($horaIncio,$horaFinal){
                    return Carbon::parse($horario['hora_inicio'])->isBetween($horaIncio,$horaFinal)
                        and Carbon::parse($horario['hora_final'])->isBetween($horaIncio,$horaFinal);
                });
                if( count($exists) == 0){
                    $novos []= [
                        'psicologo_id' => Auth::user()->id,
                        'hora_inicio' => $horaIncio,
                        'hora_final' => $horaFinal,
                        'dia_semana' => $diaSemana
                    ];
                }else{
                    $conflitos []= $dias[$diaSemana];
                }
            }else{
                $novos []= [
                    'psicologo_id' => Auth::user()->id,
                    'hora_inicio' => $horaIncio,
                    'hora_final' => $horaFinal,
                    'dia_semana' => $diaSemana
                ];
            }


        }
        $msg = '';
        $type = 'success';
        if(count($novos) > 0) {
            DB::beginTransaction();
            Horario::insert($novos);
            $msg = 'Novos horários foram cadastrados para atendimento';
            DB::commit();
        }elseif(count($conflitos) > 0) {
            $msg = "Os Dias: ";
            $msg .= implode(',',$conflitos);
            $msg .= " Já possuem horários cadastrados no intervalo ".$horaIncio->format('H:i').' - '.$horaFinal->format('H:i');
            $this->addError('diasSemana',$msg);
            return;
        }
        if(count($conflitos) > 0 and count($novos) > 0){
            $warning = "Os Dias: ";
            $warning .= implode(',',$conflitos);
            $warning .= " Já possuem horários cadastrados no intervalo ".$horaIncio->format('H:i').' - '.$horaFinal->format('H:i');
            $this->dispatchBrowserEvent('open-warning-notification',$warning);
        }

        $this->reset();
        $this->dispatchBrowserEvent('open-'.$type.'-notification',$msg);
        $this->refreshHorarios();
    }

    public function deleteHorario()
    {
        $horario = Horario::find($this->horarioId);
        $this->closeHorarioInfo();
        Db::beginTransaction();
        if($horario->eventos()->whereDate('final','>=',now())->count() == 0 and $horario->solicitacoes()->where('status',1)->count() == 0){
            $horario->delete();
            $this->dispatchBrowserEvent('open-success-notification','Horário removido com sucesso!');
            $this->refreshHorarios();
        }else {
            $this->dispatchBrowserEvent('open-error-notification', 'O Horário não pode ser removido, existem eventos pendentes');
        }
        Db::commit();

    }

    public function editHorario()
    {

    }
    public function refreshHorarios(){
        $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $psicologo = Auth::user();
        $this->horarios = $psicologo->horarios()->orderBy('dia_semana')->orderBy('hora_inicio')->get()->groupBy(function ($horario) use ($dias){
            return $dias[$horario->dia_semana];
        })->toArray();
    }

    public function render()
    {
        if($this->horaFinal == 0){
            $this->horaFinal = $this->horaInicio;
        }
        return view('livewire.psicologo.horario.index');
    }

}
