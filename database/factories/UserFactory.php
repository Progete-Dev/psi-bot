<?php


use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Cliente\Cliente::class, function (Faker $faker) {
    return [
        'nome'        => $faker->name,
        'email'       => $faker->unique()->safeEmail,
        'telefone'    => $faker->phoneNumber,
        'whatsapp'    => true,
        'motivo'      => $faker->sentence,
        'password'   => bcrypt('secret'),
    ];

});


$factory->define(App\Models\Psicologo\Psicologo::class, function (Faker $faker) {
    return [
        'nome'        => $faker->name,
        'email'       => $faker->unique()->safeEmail,
        'telefone'    => $faker->phoneNumber,
        'whatsapp'    => true,
        'crp'         => $faker->numerify(),
        'especialidade' => $faker->company,
        'password'   => bcrypt('secret'),

    ];

});
