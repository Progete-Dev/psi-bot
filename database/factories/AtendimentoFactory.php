<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Atendimento;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Atendimento::class, function (Faker $faker) {
    return [
        
        'cliente_id' => function(){
            return factory(User::class)->create()->id;
        },
        'psicologo_id'  => function(){
            return factory(User::class)->state("psicologo")->create()->id;
        },
        'inicio_atendimento' => $faker->date(),
        'final_atendimento' => $faker->date(),
        'data_atendimento' => $faker->date(),
        'status' => rand(1,5)
    ];
});
