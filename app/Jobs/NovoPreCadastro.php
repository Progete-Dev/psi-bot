<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NovoPreCadastro implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $preCadastro;
    public function __construct($preCadastro)
    {
        $this->preCadastro = $preCadastro;
    }


    public function handle()
    {

        Mail::send('mail.pre-cadastro.novo',['preCadastro' => $this->preCadastro],function($mail){
            $mail->from($this->preCadastro->email,$this->preCadastro->nome);
            $mail->to('email@test.com','Psi Admin');
            $mail->subject('Novo pré cadastro');
        });



    }
}
