<?php

namespace Tests\Feature;


use App\Models\Atendimento\Atendimento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Psicologo;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HorariosTest extends TestCase
{
    use RefreshDatabase;

    public $psicologoService;
    public $atendimentoRepo;
    public $horarioRepo;

    public function setUp() : void{
        parent::setUp();
        $this->psicologoService = resolve('App\Services\Psicologo\PsicologoService');
        $this->atendimentoRepo    = resolve('App\Repositories\AtendimentoRepository');
        $this->horarioRepo      = resolve('App\Repositories\HorarioPsicologosRepository');
    }

    /** @test */
    public function deve_retornar_lista_de_horarios(){
        Carbon::setTestNow();
        $psicologos = factory(Psicologo::class,2)->create();
        $clientes   = factory(Cliente::class,2)->create();
        for($i = 1 ; $i < 6; $i++){
            for($j= 8 ; $j < 17 ; $j +=2 ){
              if($j < 12 or $j > 13){
                  $this->horarioRepo->create([
                      'psicologo_id' => $psicologos[0]->id,
                      'dia_semana'   => $i,
                      'hora_inicio'  => $j,
                  ]);
              }
            }
        }
        $this->atendimentoRepo->create([
            "psicologo_id"=> $psicologos[0]->id,
            'cliente_id'   => $clientes[0]->id,
            "status"=> Atendimento::CONFIRMADO,
            "data_atendimento" => Carbon::today()->addDays(3)->addHours(10)
        ]);

        $this->atendimentoRepo->create([
                "psicologo_id"=> $psicologos[0]->id,
                'cliente_id'   => $clientes[1]->id,
                "status"=> Atendimento::CONFIRMADO,
                "data_atendimento" => Carbon::today()->addDays(1)->addHours(14)
        ]);
        dd($this->psicologoService->horariosDisponiveisDia($psicologos[0]->id,14,8,2020)->toArray());
        dd($this->psicologoService->horariosDisponiveisSemana($psicologos[0]->id,3,8,2020)->toArray());


    }
}
