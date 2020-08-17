<?php

use App\Models\Atendimento\Atendimento;
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
        factory(Atendimento::class,10)->create();
    }
}
