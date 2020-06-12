<?php

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
    }
}
