<?php
namespace App\Services\Psicologo;

use App\Repositories\HorarioPsicologosRepository;
use App\Repositories\PsicologoRepository;
use App\Services\BaseService;
use Carbon\Carbon;

class PsicologoService extends BaseService
{
    protected $horariosRepo;
    public function __construct(PsicologoRepository $repo,HorarioPsicologosRepository $horariosRepo)
    {
        $this->repo = $repo;
        $this->horariosRepo = $horariosRepo;
    }

    public function horariosDisponiveisDia($id,$dia,$mes,$ano)
    {
        $data = Carbon::create($ano,$mes,$dia);
        return $this->findHorariosByDate($id,$data);
    }
    public function horariosDisponiveisSemana($id,$semanaAno,$ano)
    {
        $data_inicial = Carbon::now()->weekYear($ano,0,$semanaAno)->startOfDay();
        $data_final = Carbon::now()->weekYear($ano,0,$semanaAno)->addDays(7);
        return $this->findHorariosByWeek($id,$data_inicial,$data_final);
    }

    private function findHorariosByDate($id,$data)
    {
        $psicologo    = $this->repo->find($id);
        $horarios     = $psicologo->horarios()->where('dia_semana',$data->dayOfWeek)->get();
        $atendimentos = $psicologo->atendimentos()->whereDay('data_atendimento','=',$data->day)->get();
        return $this->filterHorarios($atendimentos,$horarios);
    }

    private function findHorariosByWeek($id,$dataInicial,$dataFinal)
    {


        $psicologo    = $this->repo->find($id);
        $horarios     = $psicologo->horarios()
                        ->whereBetween('dia_semana',[0,6])
                        ->get()->filter(function($horario) use ($dataInicial,$dataFinal){
                           return $horario->eventos()
                                    ->whereBetween('data_agendada',[$dataInicial,$dataFinal])->count() == 0;
                        });
        return $horarios;
    }


    private function filterHorarios($atendimentos,$horarios)
    {
        return $horarios->filter(function ($horario) use($atendimentos){
            return $atendimentos->filter(function($atendimento) use ($horario){
                        return $atendimento->inicio_atendimento->hour ===  $horario->hora_inicio
                            and $atendimento->inicio_atendimento->dayOfWeek ===  $horario->dia_semana;
                })->count() == 0;
        });
    }

}