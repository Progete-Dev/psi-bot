<?php

namespace Tests\BotMan;

use App\Models\Atendimento\Agendamento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Psicologo;
use BotMan\Drivers\Web\WebDriver;
use Carbon\Carbon;
use RRule\RRule;
use Tests\TestCase;

class MenuConversationTest extends TestCase
{
    //use RefreshDatabase;
    /** @test */
    public $horarioRepo;
    public function setUp() : void{
        parent::setUp();
        $this->horarioRepo = resolve('App\Repositories\HorarioPsicologosRepository');
    }
    public function testBasicTest()
    {
        Carbon::setTestNow('2020-08-17 10:00:00');
        $horario = "2";
        $psicologo = factory(Psicologo::class)->create();
        for($i = 1 ; $i < 6; $i++){
            for($j= 8 ; $j < 17 ; $j +=2 ){
                if($j < 12 or $j > 13){
                    $id = $this->horarioRepo->create([
                        'psicologo_id' => $psicologo->id,
                        'dia_semana'   => $i,
                        'hora_inicio'  => Carbon::create(null,null,null,$j,0,0),
                        'hora_final'  => Carbon::create(null,null,null,$j+1,0,0)

                    ])->id;
                    $days = array_keys(RRule::WEEKDAYS);
                    $rule = new RRule([
                        'freq' => RRule::WEEKLY,
                        'byday' => $days[$i],
                        'count' => 4
                    ]);
                    Agendamento::create([
                        'cliente_id' => factory(Cliente::class)->create()->id,
                        'horario_id' => $id,
                        'data_agendada' => Carbon::create(null,null,now()->day+$i,$j+1,0,0),
                        'status' => Agendamento::AGENDADO,
                    ]);
                }
            }
        }
        $cliente = factory(Cliente::class)->create(['email'=>'email@mail.com']);
        $this->bot->setDriver(WebDriver::class);
        $this->bot
        ->receives("")
        ->assertReply('Olá, Me chamo Maju! Sou a Assistente virtual do Papo.')
        ->assertQuestion('É a primeira vez que você fala comigo?')
        ->receives('não')
        ->assertReply('Qual seu email pra te identificar nos nossos arquivos?')
        ->receives('email@mail.com')
        ->assertQuestion('Vimos que você já tem cadastro. Você quer agendar, remarcar ou cancelar um atendimento? ')
        ->receives('1')
        ->assertReply('Acesse o Link Abaixo e escolha uma data e horário para ser atendido');

    }
}
