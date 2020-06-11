<?php

namespace App\Conversations;

use App\Jobs\NotificaPsicologo;
use App\Models\Formulario;
use App\Notifications\NotificaPsicologos;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
                   $formulario = Formulario::first();
                   $this->bot->startConversation(new Boasvindas($formulario));
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
    public static function geraPergunta($texto,$campos){
        $opcoes = [];
                
        foreach($campos as $index => $opcao){
            $opcoes []= Button::create($opcao)->value($index+1);
        }

        $pergunta = Question::create($texto.": ")
        ->fallback('Opção Inválida')
        ->callbackId(Str::slug($texto))
        ->addButtons($opcoes);
        return $pergunta;
    }

    public function askEmail()
    {
        $this->ask('Qual seu email pra te identificar nos nossos arquivos?', function(Answer $answer) {

            $validator = Validator::make(['email' =>  $answer->getText()], [
                'email' => 'required|email',
                
            ]);
            $this->say($answer->getText());
            if($validator->fails()){
               
                $this->say('Seu email é invalido 😐');
                return $this->askEmail();
            }
            
            $this->email = $answer->getText();
            $this->user = User::where([
                'email' => $this->email
            ])->first();
            if($this->user != null){
                $this->menu();
            }
            

        });
    }
    public function menu(){
        
        $opcoes = [
            "agendar",                   
            "remarcar",
            "cancelar",
        ];

        $pergunta = $this->geraPergunta('Vimos que você já tem cadastro. Você quer agendar, remarcar ou cancelar um atendimento? ',$opcoes);

        $this->ask($pergunta, function(Answer $resposta){
            $opcao = $resposta->getText();
           
            switch(intval($opcao)){
                case 1:
                    $this->bot->startConversation(new AtendimentoConversation($this->user));
                
                    break;
                case 2:

                    break;
                case 3:

                    break;
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
