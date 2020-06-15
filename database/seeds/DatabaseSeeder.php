<?php

use App\Models\Atendimento;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(FormularioCadastroSeeder::class);
        $this->call(AtendimentoTableSeeder::class);
    }
}
