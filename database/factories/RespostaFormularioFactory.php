<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\CampoFormulario;
use App\Models\Formulario;
use App\Models\RespostaFormulario;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(RespostaFormulario::class, function (Faker $faker) {
    return [
        'formulario_id' => function(){
            return factory(Formulario::class)->create()->id;
        },
        'cliente_id' => function(){
            return factory(User::class)->create()->id;
        },
        'campo_id' =>function(){
            return factory(CampoFormulario::class)->create()->id;
        },
        'resposta' => $faker->sentence(1)
    ];
});
