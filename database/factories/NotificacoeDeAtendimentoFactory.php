<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\NotificacaoDeAtendimento;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(NotificacaoDeAtendimento::class, function (Faker $faker) {
    return [
        'cliente_id' =>factory(User::class)->create(['ehpsicologo'=>false])->id,
        'mensagem'  =>$faker->sentence(1)

    ];
});
