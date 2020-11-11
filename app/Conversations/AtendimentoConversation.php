<?php

namespace App\Conversations;


use App\Facades\TokenLink;
use App\Services\Psicologo\PsicologoService;
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

        $url= TokenLink::generateLink($this->user->id);
        $this->say('Acesse o Link Abaixo e escolha uma data e horário para ser atendido');
        $this->say($url);
    }
}
