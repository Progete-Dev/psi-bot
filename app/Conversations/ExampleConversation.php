<?php

namespace App\Conversations;

use App\Jobs\NotificaPsicologo;
use App\Notifications\NotificaPsicologos;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{protected $firstname;

    protected $email;
    protected $user;
    public function askFirstname()
    {
        $this->ask('Olá, tudo bem? Qual seu nome', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Olá '.$this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('Qual seu email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();
            $this->user = User::where([
                'email' => $this->email
            ])->first();
            if($this->user != null){
                $this->say('Vimos que você já tem cadastro. Você quer agendar um atendimento? ');
            }
            $this->motivo();

        });
    }

    public function motivo(){
        $this->ask('Qual o motivo da procura por atendimento?', function(Answer $answer) {
            if($this->user == null){
                $this->user = User::create(
                    [
                    'name' => $this->firstname,
                    'email' => $this->email,
                    'ehpsicologo' => false,
                    'password' => bcrypt($this->firstname.$this->email)
                    ]
                );
            }
            $this->say('Você foi cadastrado com sucesso, '.$this->firstname);
            NotificaPsicologo::dispatch($this->user, $answer->getText());
            $this->say("Encaminhamos seu atendimento! Aguarde contato 😊");
            
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}
