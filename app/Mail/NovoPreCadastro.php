<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoPreCadastro extends Mailable
{
    use Queueable, SerializesModels;
    public $preCadastro;
    public function __construct($preCadastro)
    {
        $this->preCadastro = $preCadastro;
        $this->cc('email@test.com');
    }



    public function build()
    {
        return
    }
}
