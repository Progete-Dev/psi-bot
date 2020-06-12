<?php

namespace Tests\Feature;

use App\Models\Atendimento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HorariosTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function deve_retornar_lista_de_horarios(){
        $psicologos = factory(User::class,2)->state("psicologo")->create($this->horarios());
        $atendimento1 = factory(Atendimento::class)->create([
            "psicologo_id"=> $psicologos[0]->id,
            "status"=> Atendimento::CONFIRMADO,
            "data_atendimento" => Carbon::today()->addHours(10)    
        ]);
        $atendimento2 = factory(Atendimento::class)->create([
                "psicologo_id"=> $psicologos[1]->id,
                "status"=> Atendimento::CONFIRMADO,
                "data_atendimento" => Carbon::today()->addDays(1)->addHours(10)
        
        ]);
        /** @conversationBot */
        
        $horarios = ($psicologos->groupBy(function($psicologo){
            return $psicologo->id;
        })->map(function($psicologo){
            return $psicologo[0]->horariosDisponiveis;
        }));
        
         
        
        

        

    }
    /** @test */
    public function de_listar_horarios_definidos_pelo_psicologo(){
        Carbon::setTestNow();
        $psicologo = factory(User::class)->state("psicologo")->create($this->horarios());
        $atendimento1 = factory(Atendimento::class)->create([
            "psicologo_id"=> $psicologo->id,
            "status"=> Atendimento::CONFIRMADO,
            "data_atendimento" => Carbon::today()->addHours(9)    
        ]);
        $atendimento2 = factory(Atendimento::class)->create([
                "psicologo_id"=> $psicologo->id,
                "status"=> Atendimento::CONFIRMADO,
                "data_atendimento" => Carbon::today()->addDays(1)->addHours(10)
        ]);
        $this->assertEquals($this->horarios()['horarios'],$psicologo->horarios);
      
        $this->assertEquals($this->horariosDisponiveis(),$psicologo->horariosDisponiveis->toArray());
            
    }

    /** @test */
    public function de_listar_horarios_disponiveis_do_psicologo(){
        Carbon::setTestNow();
        $psicologo = factory(User::class)->state("psicologo")->create($this->horarios());
        $atendimento1 = factory(Atendimento::class)->create([
            "psicologo_id"=> $psicologo->id,
            "status"=> Atendimento::CONFIRMADO,
            "data_atendimento" => Carbon::today()->addHours(9)    
        ]);
        $atendimento2 = factory(Atendimento::class)->create([
                "psicologo_id"=> $psicologo->id,
                "status"=> Atendimento::CONFIRMADO,
                "data_atendimento" => Carbon::today()->addDays(1)->addHours(10)
        ]);
        $this->assertEquals($this->horariosDisponiveis(),$psicologo->horariosDisponiveis->toArray());
            
    }

    /** @test */
    public function de_listar_atendimentos_da_semana_do_psicologo(){
        Carbon::setTestNow();
        $psicologo = factory(User::class)->state("psicologo")->create($this->horarios());
        $atendimento1 = factory(Atendimento::class)->create([
            "psicologo_id"=> $psicologo->id,
            "status"=> Atendimento::CONFIRMADO,
            "data_atendimento" => Carbon::today()->addHours(9) 
        ]);
        $atendimento2 = factory(Atendimento::class)->create([
                "psicologo_id"=> $psicologo->id,
                "status"=> Atendimento::CONFIRMADO,
                "data_atendimento" => Carbon::today()->addDays(1)->addHours(10)
        ]);
        
        $dia1 = $this->dias()[$atendimento1->data_atendimento->dayOfWeek];
        $hora1 = $atendimento1->data_atendimento->hour;

        $dia2 = $this->dias()[$atendimento2->data_atendimento->dayOfWeek];
        $hora2 = $atendimento2->data_atendimento->hour;

        $this->assertEquals($psicologo->atendimentosSemana->count(), 2);
        $this->assertTrue($psicologo->atendimentosSemana->has($dia1));
        $this->assertTrue($psicologo->atendimentosSemana->has($dia2));
        $this->assertEquals($psicologo->atendimentosSemana->get($dia1)->count(), 1);
        $this->assertEquals($psicologo->atendimentosSemana->get($dia2)->count(), 1);

        $this->assertTrue($psicologo->atendimentosSemana->get($dia1)->has($hora1));
        $this->assertTrue($psicologo->atendimentosSemana->get($dia2)->has($hora2));
            
    }   

    private function dias(){
        return [
            'domingo',
            'segunda',
            'terca',
            'quarta',
            'quinta',
            'sexta',
            'sabado',
        ];
    }
    private function horariosDisponiveis(){
        return  [
                'segunda'=>[
                    [
                        'de'=> 8,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 21,
                        'ate'=> 22
                    ]

                ],
                'terca'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'quarta'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'quinta'=>[
                    1 =>[
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'sexta'=>[
                    1 => [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'sabado'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'domingo'=>[
                    

                ]
        ];
    }
    private function horarios(){
        return  [
            'horarios'=>[
                'segunda'=>[
                    [
                        'de'=> 8,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 21,
                        'ate'=> 22
                    ]

                ],
                'terca'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'quarta'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'quinta'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'sexta'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'sabado'=>[
                    [
                        'de'=> 9,
                        'ate'=> 10
                    ],
                    [
                        'de'=> 17,
                        'ate'=> 18
                    ]

                ],
                'domingo'=>[
                    

                ],
            ]
        ];

    }
}
