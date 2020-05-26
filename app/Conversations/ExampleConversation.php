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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ExampleConversation extends Conversation
{protected $firstname;

    protected $email;
    protected $user;
    public function askFirstname()
    {
        $this->say('Olá, me chamo Maju!');
        $this->ask('É a primeira vez que você fala comigo?',[
            [
               'pattern' => 'sim|sm|s|ss',
               'callback' => function () {
                   $this->say('Seja bem vindo! Vamos fazer um cadastro para melhor atendê-lo. 😊');
                   $this->bot->startConversation(new Boasvindas());
                }
            ],
            [
                'pattern' => 'não|n|nao|nn',
                'callback' => function () {
                    $this->askEmail();
                }
            ]
        ]);
    }

    public function askEmail()
    {
        $this->ask('Qual seu email pra te identificar nos nossos arquivos?', function(Answer $answer) {

            $validator = Validator::make(['email' =>  $answer->getText()], [
                'email' => 'required|unique:users|email',
                
            ]);

            if($validator->fails()){
               
                $this->say('Seu email é invalido 😐');
                return $this->askEmail();
            }
            
            $this->email = $answer->getText();
            $this->user = User::where([
                'email' => $this->email
            ])->first();
            if($this->user != null){
                $this->say('Vimos que você já tem cadastro. Você quer agendar um atendimento? ');
            }

            

        });
    }

    
    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
        
    }
    
    // $botman->fallback(function($bot) {
    //     $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
    // });
}
