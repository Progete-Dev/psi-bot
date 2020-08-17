<?php

/** @var Factory $factory */

use App\Model;
use App\Models\Cliente\Cliente;
use App\Models\Formulario\CampoFormulario;
use App\Models\Formulario\RespostaFormulario;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(RespostaFormulario::class, function (Faker $faker) {
    return [
        'cliente_id' => function(){
            return factory(Cliente::class)->create()->id;
        },
        'campo_id' =>function(){
            return factory(CampoFormulario::class)->create()->id;
        },
        'resposta' => $faker->sentence(1)
    ];
});
