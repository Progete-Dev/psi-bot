<?php

namespace App\Jobs;

use App\Notificacao;
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
    public function __construct($user , $mensagem)
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
        Notificacao::create([
            "cliente"=>$this->user->id,
            "mensagem"=>$this->mensagem
        ]);
    }
}
