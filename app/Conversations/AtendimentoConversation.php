<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class AtendimentoConversation extends Conversation
{
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
        
    }


    public function run()
    {
        //terminar
        // protected $diaDaSemana;
        // ExampleConversation::geraPergunta();
        // //terminar
        // public function(){
            
        //     $this->geraPergunta('Pra qual dia da semana você pretende agendar?',$diaDaSemana);

        // }

        
    }
}
