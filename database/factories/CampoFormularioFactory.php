<?php

/** @var Factory $factory */

use App\Models\Formulario\CampoFormulario;
use App\Models\Formulario\Formulario;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CampoFormulario::class, function (Faker $faker) {
    $tipo = 4;
    return [
        'formulario_id' => function(){
            return factory(Formulario::class)->create()->id;
        },
        'nome' => $faker->firstName(),
        'tipo' => 4,
        'opcoes' => function() use ($tipo,$faker){
            switch($tipo){
                case 1 :
                    return '';
                break;
                case 2 :
                    return '';
                break;
                case 3 :
                    return '';
                break;
                case 4 :
                    $opcoes = [];
                    for($i = 0 ; $i < rand(2,10) ; $i++){
                        $opcoes[]=[
                            'valor' => $faker->sentence(),
                            'nome'  => $faker->sentence(),
                        ];
                    }
                    return $opcoes;
                break;
                case 5 :
                    return '';
                break;
                default :
                    return '[]';
                break;
            }
        },
        'obrigatorio' => $faker->boolean()
    ];
});
