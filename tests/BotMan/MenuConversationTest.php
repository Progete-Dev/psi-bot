<?php

namespace Tests\BotMan;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class MenuConversationTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function testBasicTest()
    {
        $horario = "2";
        $psicologo = factory(User::class)->state("psicologo")->create();
        $user = factory(User::class)->create(['email' => 'email@mail.com']);
        $this->bot
        ->receives('')
        ->assertReply('Olá, Me chamo Maju! Sou a Assistente virtual do Papo.')
        ->assertReply('É a primeira vez que você fala comigo?')
        ->receives('não')
        ->assertReply('Qual seu email pra te identificar nos nossos arquivos?')
        ->receives('email@mail.com')
        ->assertQuestion('Vimos que você já tem cadastro. Você quer agendar, remarcar ou cancelar um atendimento? ')
        ->receives('1')
        ->assertQuestion('Em qual dia da semana você quer seu atendimento?')
        ->receives(Carbon::today()->dayOfWeek)
        ->assertQuestion('Selecione entre os horarios disponiveis')
        ->receives('2')
        ->assertReply("Você escolheu o dia". Carbon::today()->addHours($horario)->format("d, M - H:m ")." com o Psicologo $psicologo->name")
        ->assertQuestion('Você confirma?')
        ->receives('0')
        ->assertReply('Seu atendimento foi cadastrado. Aguarde nossa mensagem de confirmação!');

    }
}
