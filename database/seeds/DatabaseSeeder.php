<?php

use App\User;
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
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'maria',
                'email' => 'mariaza@email.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'joao',
                'email' => 'maria@email.com',
                'password' => bcrypt('123456')                
            ],
       
       ]);
    }
}
