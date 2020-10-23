<?php

/** @var Factory $factory */


use App\Models\Psicologo\Horario;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Horario::class, function (Faker $faker) {
    $data = now()->startOfWeek()->hour(rand(0,23))->addDays(rand(0,6));
    return [
        'psicologo_id' => factory(Psicologo::class)->create()->id,
        'hora_inicio' =>  $data,
        'dia_semana' => $data->dayOfWeek,
        'hora_final'  => $data->copy()->addHour(),

    ];
});
