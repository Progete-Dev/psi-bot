<?php

use App\Models\CampoFormulario;
use App\Models\Formulario;
use Illuminate\Database\Seeder;

class FormularioAtendimentoInfAcadSeeder extends Seeder
{
        /**
            * Run the database seeds.
            *
            * @return void
        */
    public function run()
    {
        $formulario = Formulario::create([
            'titulo'        => 'Informações Academicas'
        ]);

        CampoFormulario::create([
            'nome'          => 'Formacao Escolar',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => 'Escola Publica',
                    'nome'  => ' Escola Publica',
                ],
                [
                    'valor' => 'Escola Privada',
                    'nome'  => 'Escola Privada',
                ],
                [
                    'valor' => 'Escola Publica e Privada',
                    'nome'  => 'Escola Publica e Privada',
                ]
            ]),
            'obrigatorio'           => true,
            'formulario_id'         =>$formulario->id,
            'validacao'             => "required|in:Escola Publica, Escola Privada, Escola Publica e Privada"
        ]);

        CampoFormulario::create([
            'nome'          => 'Turno do curso na UFC',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' =>$formulario->id,
            'validacao'     =>"required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Selecione o curso',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => 'Engenharia de Software',
                    'nome'  => 'Engenharia de Software',
                ],
                [
                    'valor' => 'Ciencia da Computacao',
                    'nome'  => 'Ciencia da Computacao',
                ],
                [
                    'valor' => 'Engenharia de Producao',
                    'nome'  => 'Engenharia de Producao',
                ],
                [
                    'valor' => 'Engenharia Mecanica',
                    'nome'  => 'Engenharia Mecanica',
                ],
                [
                    'valor' => 'Engenharia Civil',
                    'nome'  => 'Engenharia Civil',
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|in:Engenharia de Software,Ciencia da Computacao,Engenharia de Producao,Engenharia Mecania,Engenharia Civil"
        ]);
        
        CampoFormulario::create([
            'nome'          => 'Matricula',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     =>"required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Semestre Atual',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Forma de Ingresso',
            'tipo'          => 3,
            'opcoes'        => json_encode([
                [
                    'valor' => 'Ampla Concorrencia',
                    'nome'  => 'Ampla Concorrencia'
                ],
                [
                    'valor' => 'Cotas',
                    'nome'  => 'Cotas'
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|in:Ampla Concorrencia, Cotas"
        ]);

        CampoFormulario::create([
            'nome'          => 'Tipo de Cota',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Semestre de Ingresso',
            'tipo'          => 2,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Cursos Concluidos',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => ""
        ]);

        CampoFormulario::create([
            'nome'          => 'Cursos nao Concluidos',
            'tipo'          => 2,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => ""
        ]);
    }
}