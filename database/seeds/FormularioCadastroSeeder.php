<?php


use App\Models\Formulario\CampoFormulario;
use App\Models\Formulario\Formulario;
use Illuminate\Database\Seeder;

class FormularioCadastroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formulario = Formulario::create([
            'titulo' => 'Informações Pessoais',
        ]);

        CampoFormulario::create([

            'nome'          => 'Nome Completo',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"

        ]);

        CampoFormulario::create([
            'nome'          => 'Nome Social',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => ""
        ]);

        CampoFormulario::create([
            'nome'          => 'Data de Nascimento',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|date_format:d/m/Y"
        ]);
        CampoFormulario::create([
            'nome'          => 'Sexo',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => '1' ,
                    'nome'  =>  'Masculino',
                ],
                [
                    'valor' => '2' ,
                    'nome'  =>  'Feminino',
                ],
                [
                    'valor' => '3' ,
                    'nome'  =>  'Não Declarado',
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|in:Masculino,Feminino,Não declarado"
            
        ]);
        CampoFormulario::create([
            'nome'          => 'Formação Escolar Básica',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Telefone',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);

        CampoFormulario::create([
            'nome'          => 'Estado civil',
            'tipo'          => 4,
            'opcoes'        => json_encode([
                [
                    'valor' => '1' ,
                    'nome'  =>  'Solteiro(a)',
                ],
                [
                    'valor' => '2' ,
                    'nome'  =>  'Casado(a)',
                ],
                [
                    'valor' => '3' ,
                    'nome'  =>  'Divorciado(a)',
                ],
                [
                    'valor' => '4' ,
                    'nome'  =>  'União Estavél',
                ],
                [
                    'valor' => '5' ,
                    'nome'  =>  'Separado(a)',
                ],
                [
                    'valor' => '6' ,
                    'nome'  =>  'Viuvo(a)',
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|in:Solteiro(a), Casado(a), Divorciado(a), União estável, Separado(a), Viuvo(a)"
        ]);
        CampoFormulario::create([
            'nome'          => 'Possui Filhos',
            'tipo'          => 3,
            'opcoes'        => json_encode([
                [
                    'valor' => '1',
                    'nome'  => 'Sim'
                ],
                [
                    'valor' => '2',
                    'nome'  => 'Não'
                ]
            ]),
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required|in:Sim,Não"
        ]);
        CampoFormulario::create([
            'nome'          => 'Cidade de Origem',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);
        CampoFormulario::create([
            'nome'          => 'Endereço Atual',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);
        CampoFormulario::create([
            'nome'          => 'Composição moradia de origem',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => ""
        ]);
        CampoFormulario::create([
            'nome'          => 'Composição moradia atual',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => false,
            'formulario_id' => $formulario->id,
            'validacao'     => ""
        ]);
        CampoFormulario::create([
            'nome'          => 'Em caso de emergência ligar para',
            'tipo'          => 1,
            'opcoes'        => '[]',
            'obrigatorio'   => true,
            'formulario_id' => $formulario->id,
            'validacao'     => "required"
        ]);        
    }
}
