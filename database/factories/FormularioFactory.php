<?php

/** @var Factory $factory */

use App\Model;
use App\Models\Formulario\Formulario;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Formulario::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(1),
        'descricao' => $faker->sentence
    ];
});
