<?php

namespace App\Conversations;


use App\Facades\TokenLink;
use App\Services\Psicologo\PsicologoService;
use BotMan\BotMan\Messages\Conversations\Conversation;

class AtendimentoConversation extends Conversation
{
    use GeraPergunta;
    protected $service;
    protected $horarioService;
    public $user;
    public $data;
    public $hora;
    public function __construct(PsicologoService $service, $user)
    {
        $this->user = $user;
        $this->service = $service;



    }


    public function run()
    {

        $url= TokenLink::generateLink($this->user->id);
        $this->say('Acesse o Link Abaixo e escolha uma data e horário para ser atendido');
        $this->say($url);
    }
}
