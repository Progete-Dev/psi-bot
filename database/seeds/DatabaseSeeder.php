<?php

use App\Models\Atendimento\Agendamento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Horario;
use Carbon\Carbon;
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
        $psi = 1;
        for($i = 1 ; $i < 6; $i++){
            for($j= 8 ; $j < 17 ; $j +=2 ){
                if($j < 12 or $j > 13){
                    $horario = Horario::create([
                        'psicologo_id' => $psi,
                        'dia_semana'   => $i,
                        'hora_inicio'  => Carbon::create(null,null,null,$j,0,0),
                        'hora_final'  => Carbon::create(null,null,null,$j+1,0,0)
                    ]);
                    Agendamento::create([
                        'cliente_id' => factory(Cliente::class)->create()->id,
                        'horario_id' => $horario->id,
                        'status' => Agendamento::PENDENTE,
                        'data_agendada' => Carbon::create(2020,9,$i,0)->startOfWeek()
                        ->addDays($horario->dia_semana > 1 ? $horario->dia_semana-1 : 0)
                        ->hour($horario->hora_inicio->hour)
                        ->minute($horario->hora_inicio->minute)
                    ]);
                }
            }
        }
        //$this->call(AtendimentoTableSeeder::class);
    }
}
