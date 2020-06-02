<?php

namespace Tests\Feature;

use App\Models\CampoFormulario;
use App\Models\Formulario;
use App\Models\RespostaFormulario;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormularioAtendimentoTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_should_return_user_formulario_answers()
    {
        $user = factory(User::class)->create(['ehpsicologo' => false]);
        $formulario = factory(Formulario::class)->create(['titulo' => "Form1"]);

        $campos = factory(CampoFormulario::class, 2)->create(['formulario_id' => $formulario->id], ['formulario_id' => $formulario->id])->pluck('id');


        $reposta1 = factory(RespostaFormulario::class)->create([
            'formulario_id' => $formulario->id,
            'campo_id' => $campos[0],
            'cliente_id' => $user->id,
            'resposta' => 'Resposta 1'
        ]);
        $reposta2 = factory(RespostaFormulario::class)->create([
            'formulario_id' => $formulario->id,
            'campo_id' => $campos[1],
            'cliente_id' => $user->id,
            'resposta' => 'Resposta 2'
        ]);

        $repostas = $formulario->campos->map(function ($campo) use ($user) {
            return $campo->resposta($user->id)->toArray();
        });


        $this->assertEquals($reposta1->resposta, $repostas[0][0]['resposta']);
        $this->assertEquals($reposta1->formulario->id, $repostas[0][0]['formulario_id']);
        $this->assertEquals($reposta1->cliente->id, $repostas[0][0]['cliente_id']);
        $this->assertEquals($reposta1->campo->id, $repostas[0][0]['campo_id']);

        $this->assertEquals($reposta2->resposta, $repostas[1][0]['resposta']);
        $this->assertEquals($reposta2->formulario->id, $repostas[1][0]['formulario_id']);
        $this->assertEquals($reposta2->cliente->id, $repostas[1][0]['cliente_id']);
        $this->assertEquals($reposta2->campo->id, $repostas[1][0]['campo_id']);
    }

    /** @test */
    public function it_should_return_formulario_campos()
    {
        $user = factory(User::class)->create(['ehpsicologo' => false]);
        $formulario = factory(Formulario::class)->create(['titulo' => "Form1"]);

        $campos = factory(CampoFormulario::class, 2)->create(['formulario_id' => $formulario->id], ['formulario_id' => $formulario->id])->pluck('id');

        $this->assertEquals($formulario->campos->pluck('id'), $campos);
    }

    /** @test */
    public function it_should_return_campos_formulario()
    {
        $user = factory(User::class)->create(['ehpsicologo' => false]);
        $formulario = factory(Formulario::class)->create(['titulo' => "Form1"]);

        $campos = factory(CampoFormulario::class, 2)->create(['formulario_id' => $formulario->id], ['formulario_id' => $formulario->id]);

        $this->assertEquals($campos[0]->formulario->id, $formulario->id);
        $this->assertEquals($campos[1]->formulario->id, $formulario->id);
    }
}
