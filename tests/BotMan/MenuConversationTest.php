<?php

namespace Tests\BotMan;

use App\Models\Atendimento\Agendamento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Horario;
use App\Models\Psicologo\Psicologo;
use App\Models\User;
use BotMan\Drivers\Web\WebDriver;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RRule\RRule;
use Tests\TestCase;

class MenuConversationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public $horarioRepo;
    public function setUp() : void{
        parent::setUp();
        $this->horarioRepo = resolve('App\Repositories\HorarioPsicologosRepository');
    }
    public function testBasicTest()
    {
        $horario = "2";
        $psicologo = factory(Psicologo::class)->create();
        for($i = 1 ; $i < 6; $i++){
            for($j= 8 ; $j < 17 ; $j +=2 ){
                if($j < 12 or $j > 13){
                    $this->horarioRepo->create([
                        'psicologo_id' => $psicologo->id,
                        'dia_semana'   => $i,
                        'hora_inicio'  => Carbon::create(null,null,null,$j,0,0),
                        'hora_final'  => Carbon::create(null,null,null,$j+1,0,0)

                    ]);
                }
            }
        }


        $user = factory(Cliente::class)->create(['email' => 'email@mail.com','telefone' => '8800000','whatsapp' => true]);
        $rule = new RRule([
            'freq' => RRule::MONTHLY,
            'byday' => '3MO',
            'count' => 2
        ]);

        $agendamento =$user->agendamentos()->create([
            'horario_id' => Horario::where('dia_semana',now()->dayOfWeek)->first()->id,
            'data_agendada' => Carbon::now(),
            'status' => Agendamento::PENDENTE,
            'recorrencia' => $rule->getRule()
        ]);
        $rule = new RRule($agendamento->recorrencia);
        Carbon::setLocale('pt_BR');
        dd(Carbon::parse($rule[1]),$agendamento->data_agendada);

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
        ->assertQuestion('Em qual dia da semana você quer seu atendimento?')
        ->receives(Carbon::today()->dayOfWeek)
        ->assertQuestion('Selecione entre os horarios disponiveis')
        ->receives('2')
        ->assertQuestion('Selecione um psicologo para solicitar o atendimento')
        ->receives('1')
        ->assertQuestion("Você escolheu o horário: 10:00:00 - 11:00:00 com {$psicologo->nome}({$psicologo->crp})\nestá tudo certo ?")
        ->receives('0')
        ->assertReply('Seu atendimento foi cadastrado. Aguarde nossa mensagem de confirmação!');

    }
}
