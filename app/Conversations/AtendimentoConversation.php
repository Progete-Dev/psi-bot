<?php

namespace App\Conversations;

use App\Services\Psicologo\PsicologoService;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Carbon;

class AtendimentoConversation extends Conversation
{
    use GeraPergunta;
    protected $service;
    protected $horarioService;
    public $user;
    public $horariosDisponiveis;
    public $semanaAno;
    public $semanaDia;
    public $diaSemana;
    public $hora;
    public function __construct(PsicologoService $service, $user)
    {
        $this->user = $user;
        $this->service = $service;
        $date = Carbon::now();
        $this->semanaAno = $date->weekOfYear;
        $this->semanaDia = $date->weekOfMonth;
        $this->diaSemana = $date->dayOfWeek;
        $this->horariosDisponiveis = collect($this->service->all()->reduce(function ($array,$psicologo){
            $array = array_merge($array,$this->service
                ->horariosDisponiveisSemana($psicologo->id,$this->semanaAno,now()->year)
                ->map->only(['id','psicologo_id','dia_semana','hora_inicio','hora_final'])
                ->toArray());
            return $array;
        },[]))->groupBy(function($horario){
            return $horario['dia_semana'];
        });

    }

    protected function getHorariosSemana(){
        $horarios = [];
        foreach($this->horariosDisponiveis as $diaSemana => $h){
            $hora = now()->week($this->semanaAno)->startOfWeek()->subDay()->addDays($diaSemana);

            $horarios []= [
                'text' =>'Dia: '.$hora->format('d M Y') .' -  Horarios Disponiveis : '. count($h),
                'info' => ['dia_semana' =>$diaSemana, 'hora' => $hora->timestamp,]
            ];
        }
        return $horarios;
    }

    public function run()
    {
        $horarios = $this->getHorariosSemana();

        $pergunta = $this->geraPergunta('Em qual dia da semana você quer seu atendimento?',$horarios);

        $this->ask($pergunta,function($resposta) use ($horarios) {
            $this->diaSemana = $horarios[intval($resposta->getText())-1]['info']['dia_semana'];
            $horariosDia = $this->horariosDisponiveis[$this->diaSemana];
            $horariosData = [];
            $horariosDia = collect($horariosDia)->groupBy(function ($horario){
               return $horario['hora_inicio'].' - '. $horario['hora_final'];
            });
            foreach($horariosDia as $hora => $horarios){
                $horariosData []= [
                    'text' =>'Horario :'. $hora .' - '.count($horarios).' disponiveis',
                    'info' => ['id' => $hora]
                ];
            }
            $pergunta = $this->geraPergunta('Selecione entre os horarios disponiveis',$horariosData);
            $this->ask($pergunta,function($resposta) use($horariosData,$horariosDia){
                $this->hora = $horariosData[intval($resposta->getText())-1]['info']['id'];
                $horarios = [];
                foreach($horariosDia[$this->hora] as $horario){
                    $horarios []= [
                        'text' =>'Psicologo :'. $this->service->find($horario['psicologo_id'])->nome,
                        'info' => ['id' => $horario['id'],'psicologo' => $horario['psicologo_id']]
                    ];
                }
                $pergunta = $this->geraPergunta('Selecione um psicologo para solicitar o atendimento',$horarios);
                $this->ask($pergunta,function($resposta) use($horarios){
                    $id = intval($resposta->getText())-1;
                    $psicologo = $this->service->find($horarios[$id]['info']['psicologo']);
                    $horario = $psicologo->horarios()->find($horarios[$id]['info']['id']);
                    $pergunta = $this->geraPergunta('Você escolheu o horário: '. $horario->hora_inicio.' - '. $horario->hora_final.
                        ' com '. $psicologo->nome . "({$psicologo->crp})\n".
                        'está tudo certo ?',['Sim','Não']);
                    $this->ask($pergunta,function($resposta){
                        if(intval($resposta->getText()) == 1){

                        }
                    });
                });
            });
        });
    }
}
