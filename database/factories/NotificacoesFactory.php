<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Notificacao;
use App\User;
use Faker\Generator as Faker;

$factory->define(Notificacao::class, function (Faker $faker) {
    return [
        'cliente'=>factory(User::class)->create(['ehpsicologo'=>false])->id,
        'mensagem'=>$faker->sentence(1)

    ];
});
