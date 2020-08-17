<?php

/** @var Factory $factory */


use App\Models\Atendimento\Atendimento;
use App\Models\Cliente\Cliente;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Atendimento::class, function (Faker $faker) {
    return [
        
        'cliente_id' => function(){
            return factory(Cliente::class)->create()->id;
        },
        'psicologo_id'  => null,
        'inicio_atendimento' => $faker->date(),
        'final_atendimento' => $faker->date(),
        'data_atendimento' => $faker->date(),
        'status' => rand(1,5)
    ];
});
