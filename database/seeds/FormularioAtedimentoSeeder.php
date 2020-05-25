<?php

use App\Models\CampoFormulario;
use App\Models\Formulario;
use Illuminate\Database\Seeder;

class FormularioAtedimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulario = Formulario::create([
            'titulo' => 'Informações Pessoais'
        ]);

        CampoFormulario::create([
            'nome'          => 'Nome Social',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);

        CampoFormulario::create([
            'nome'          => 'Data de Nascimento',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Sexo',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => 'M' ,
                    'nome'  =>  'Masculino',
                ],
                [
                    'valor' => 'F' ,
                    'nome'  =>  'Feminino',
                ],
                [
                    'valor' => 'ND' ,
                    'nome'  =>  'Não Declarado',
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Formação Escolar Básica',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);

        CampoFormulario::create([
            'nome'          => 'Telefone',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);

        CampoFormulario::create([
            'nome'          => 'Estado civil',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => 'Solteiro(a)' ,
                    'nome'  =>  'Solteiro(a)',
                ],
                [
                    'valor' => 'Casado(a)' ,
                    'nome'  =>  'Casado(a)',
                ],
                [
                    'valor' => 'Divorciado(a)' ,
                    'nome'  =>  'Divorciado(a)',
                ],
                [
                    'valor' => 'União Estavél' ,
                    'nome'  =>  'União Estavél',
                ],
                [
                    'valor' => 'Separado(a)' ,
                    'nome'  =>  'Separado(a)',
                ],
                [
                    'valor' => 'Viuvo(a)' ,
                    'nome'  =>  'Viuvo(a)',
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Possui Filhos',
            'tipo'          => 3,
            'opcoes'        => json_encode([
                [
                    'valor' => 'sim'
                ],
                [
                    'valor' => 'não'
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Cidade de Origem',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Endereço Atual',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Composição moradia de origem',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Composição moradia atual',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);
        CampoFormulario::create([
            'nome'          => 'Em caso de emergência ligar para',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id
        ]);        
    }
}
