<?php

use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Psicologo;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::insert([
            [
                'nome' => 'paula',
                'email' => 'paula@email.com',
                'telefone' => '0000000000',
                'whatsapp'  => true,
                'motivo' => 'teste'
            ],
            [
                'nome' => 'maria',
                'email' => 'mariaza@email.com',
                'telefone' => '0000000000',
                'whatsapp'  => true,
                'motivo' => 'teste'
            ],
            [
                'nome' => 'joao',
                'email' => 'joao@email.com',
                'telefone' => '0000000000',
                'whatsapp'  => true,
                'motivo' => 'teste'
            ],
       
       ]);
        Psicologo::create([
            'nome' => 'michele',
            'email' => 'michele@email.com',
            'telefone' => '0000000000',
            'whatsapp'  => true,
            'password' => bcrypt('123456'),
            'crp' => '00/00000',
            'especialidade' => 'Especialidade'
        ]);
    }
}
