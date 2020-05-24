<?php

namespace App\Jobs;

use App\Models\Atendimento;
use App\Models\NotificacaoDeAtendimento;
use App\Models\NotificacaoPsicologo;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificaPsicologo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $mensagem;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user , $mensagem)
    {
        $this->user=$user;
        $this->mensagem=$mensagem;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->user->ultimoAtendimento()){
            if($this->user->ultimoAtendimento()->status > 3 ){
                return;
            }
            return;
        }

        $atendimento = Atendimento::create([
            'cliente_id' => $this->user->id,
            'status' => 1,
            'psicologo_id' => null,
            'tempo_atendimento' => 0,
            'data_atendimento' => null
        ])->id;

        $id = NotificacaoDeAtendimento::create([
            'cliente_id'  => $this->user->id,
            'mensagem' => $this->mensagem,
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
