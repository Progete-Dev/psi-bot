<?php

namespace Tests\Feature;

use App\Notificacao;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestNotification extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void{
        parent::setUp();
        $this->actingAs(factory(User::class)->create([
            'ehpsicologo'=>true,
            
        ]));
    }

    /** @test */
    public function testExample()
    {
        $usuario = factory(User::class)->create(['ehpsicologo'=>false]);
        $notificacao = factory(Notificacao::class)->create(['mensagem'=>"mensagem", 'cliente'=>$usuario->id]);
        $response = $this->get('/psicologo/home');
        $response->assertViewHas("notificacoes");
        $this->assertEquals($response->viewData("notificacoes")->first()->toArray(), $notificacao->toArray());

        $response->assertStatus(200);
    }
}
