<?php

namespace App\Jobs;

use App\Models\Atendimento;
use App\Models\NotificacaoDeAtendimento;
use App\Models\NotificacaoPsicologo;
use App\Models\RespostaFormulario;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeraAtendimento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $respostas;
    protected $email;
    protected $motivo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($respostas ,$email,$motivo)
    {
        $this->respostas = $respostas;
        $this->email = $email;
        $this->motivo = $motivo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        

        $user = User::create([
            'name' => $this->respostas[0]['resposta'],
            'email' => $this->email,
            'password' => bcrypt($this->respostas[0]['resposta'].$this->email)
        ]);

        foreach ($this->respostas as $resposta) {
            RespostaFormulario::insert([
                'formulario_id' => $resposta['formulario_id'],
                'campo_id'      => $resposta['campo_id'],
                'cliente_id'    => $user->id,
                'resposta'      => $resposta['resposta']
            ]);
        }
        $atendimento = Atendimento::create([
            'cliente_id' => $user->id,
            'status' => 1,
            'psicologo_id' => null,
            'tempo_atendimento' => 0,
            'data_atendimento' => null
        ])->id;

        $id = NotificacaoDeAtendimento::create([
            'cliente_id'  => $user->id,
            'mensagem' => 'Solicitação de atendimento Cliente: '.$user->name.' motivo: '. $this->motivo,
            'atendimento_id' =>  $atendimento
        ])->id;

        User::where('ehpsicologo',true)->each(function($psicologo) use ($id){
            NotificacaoPsicologo::insert([
                'notificacao' => $id,
                'psicologo' => $psicologo->id,
                'notificado' => false,
            ]);
        });
    }
}
