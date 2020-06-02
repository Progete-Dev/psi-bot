<?php

namespace Tests\BotMan;

use App\Models\CampoFormulario;
use App\Models\Formulario;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SaudacaoTest extends TestCase
{
    use DatabaseTransactions;   
    

    public function setUp() : void{
        //Artisan::call('cache:clear');
        parent::setUp();
    }

    /** @test */
    public function fluxo_primeira_conversa_sim()
    {
        $formulario = factory(Formulario::class)->create(['titulo' => "Form1"]);

        $campo1 = factory(CampoFormulario::class)->create(
            [
                'nome'          => 'Nome Completo',
                'tipo'          => 1,
                'opcoes'        => '[]',
                'obrigatorio'   => true,
                'formulario_id' => $formulario->id,
                'validacao'     => "required"
    
            ]
        );
        $campo2 = factory(CampoFormulario::class)->create(
            [
                'nome'          => 'campo 2',
                'tipo'          => 1,
                'opcoes'        => '[]',
                'obrigatorio'   => false,
                'formulario_id' => $formulario->id,
                'validacao'     => ""
    
        ]);
        

        $this->withExceptionHandling();

        $this->bot
            ->receives('')
            ->assertReply('Olá, me chamo Maju!')
            ->assertReply('É a primeira vez que você fala comigo?')
            ->receives('sim')
            ->assertReply('Seja bem vindo! Vamos fazer um cadastro para melhor atendê-lo. 😊')
            ->assertReply('Nome Completo (Obrigatório): ')
            ->receives('nome do usuario')
            ->assertReply('campo 2: ')
            ->receives('resposta campo 2')
            ->assertReply('Para completar o seu cadastro precisammos que informe um Email')
            ->receives('email@email.com')
            ->assertReply('Qual motivo para o seu contato conosco?')
            ->assertReply('Suas informações foram cadastradas com sucesso!')
            ->receives('motivo');

        $this->assertDatabaseHas('users',[
            'name'=> 'nome do usuario',
            'email'=> 'email@email.com',

        ]);
        $this->assertDatabaseHas('resposta_formularios',[
            'formulario_id' => $formulario->id,
            'campo_id'      => $campo1->id,
            'resposta'      => 'nome do usuario'
        ]);
        $this->assertDatabaseHas('resposta_formularios',[
            'formulario_id' => $formulario->id,
            'campo_id'      => $campo2->id,
            'resposta'      => 'resposta campo 2'
        ]);
        

    }
    // /** @test */
    // public function fluxo_primeira_conversa_nao()
    // {
    //     $this->bot
    //         ->receives('')
    //         ->assertReply('Olá, me chamo Maju! Qual seu nome?')
    // 		->receives('leticia')
    //         ->assertReply('Olá leticia')
    //         ->assertReply('É a primeira vez que você fala comigo?')
    //         ->receives('nao')
    //         ->assertReply('Seja bem vindo de volta!')
    //         ->assertReply('Qual seu email pra te identificar nos nossos arquivos?')
    //         ->receives('leticia!email.com')
    //         ->assertReply('Seu email é invalido 😐')
    //         ->assertReply('Qual seu email pra te identificar nos nossos arquivos?');

    // }
}

