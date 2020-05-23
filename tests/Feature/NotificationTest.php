<?php

namespace Tests\Feature;

use App\Models\NotificacaoDeAtendimento;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestNotification extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void{
        parent::setUp();
        $this->actingAs(factory(User::class)->create([
            'ehpsicologo'=>true,
            
        ]));
    }

    /** @test */
    public function it_should_see_notifications()
    {
        $usuario = factory(User::class)->create(['ehpsicologo'=>false]);
        $notificacao = factory(NotificacaoDeAtendimento::class)->create(['mensagem'=>"mensagem", 'cliente_id'=>$usuario->id]);
        $response = $this->get('/psicologo/home');
        $response->assertViewHas("notificacoes");
        $this->assertEquals($response->viewData("notificacoes")->first()->toArray(), $notificacao->toArray());

        $response->assertStatus(200);
    }
}
