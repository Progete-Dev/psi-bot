<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Formulario;
use Faker\Generator as Faker;

$factory->define(Formulario::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(1)
    ];
});
