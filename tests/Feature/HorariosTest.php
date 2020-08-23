<?php

namespace Tests\Feature;


use App\Models\Atendimento\Agendamento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Psicologo;
use Carbon\Carbon;
use Tests\TestCase;

class HorariosTest extends TestCase
{
    //use RefreshDatabase;

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
                  $id =$this->horarioRepo->create([
                      'psicologo_id' => $psicologos[0]->id,
                      'dia_semana'   => $i,
                      'hora_inicio'  => Carbon::create(null,null,null,$j,0,0),
                      'hora_final'  => Carbon::create(null,null,null,$j+1,0,0)
                  ])->id;
                  $solicitacao = Agendamento::create([
                      'cliente_id' => factory(Cliente::class)->create()->id,
                      'horario_id' => $id,
                      'data_agendada' => Carbon::create(null,null,$i,$j,0,0),
                      'status' => Agendamento::AGENDADO,
                  ]);

              }
            }
        }



        dd($psicologos[0]->notificacoes);

    }
}
