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
       User::insert([
            [
                'name' => 'paula',
                'email' => 'paula@email.com',
                'password' => bcrypt('123456'),
                'ehpsicologo' => false
            ],
            [
                'name' => 'maria',
                'email' => 'mariaza@email.com',
                'password' => bcrypt('123456'),
                'ehpsicologo' => false
            ],
            [
                'name' => 'joao',
                'email' => 'maria@email.com',
                'password' => bcrypt('123456'),
                'ehpsicologo' => false                
            ],
            [
                'ehpsicologo'=>true,
                'name' => 'michele',
                'email' => 'michele@email.com',
                'password' => bcrypt('123456')                
            ],
       
       ]);
       Atendimento::create([
        'cliente_id' => 2,
        'status' => 3,
        'psicologo_id' => 4,
        'tempo_atendimento' => 0,
        'data_atendimento' => now()
        ]);
        Atendimento::create([
            'cliente_id' =>3,
            'status' => 4,
            'psicologo_id' => 4,
            'tempo_atendimento' => 0,
            'data_atendimento' => now()
            ]);

       Atendimento::create([
        'cliente_id' => 1,
        'status' => 2,
        'psicologo_id' => 4,
        'tempo_atendimento' => 0,
        'data_atendimento' => null
        ]);

        Atendimento::create([
            'cliente_id' => 1,
            'status' => 1,
            'psicologo_id' => null,
            'tempo_atendimento' => 0,
            'data_atendimento' => null
            ]);
    }
}
