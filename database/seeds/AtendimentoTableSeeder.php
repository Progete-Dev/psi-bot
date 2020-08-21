<?php

use App\Models\Atendimento\Agendamento;
use Illuminate\Database\Seeder;

class AtendimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agendamento::class,10)->create();
    }
}
