<?php

namespace App\Conversations;
use Illuminate\Support\Facades\Log;
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
use Illuminate\Support\Facades\Validator;

class ExampleConversation extends Conversation
{protected $firstname;

    protected $email;
    protected $user;
    public function askFirstname()
    {
        $this->say('Olá, me chamo Maju!');
        $question = Question::create('É a primeira vez que você fala comigo?')
        ->fallback('Algo deu errado')
        ->callbackId('primeiro_contato')
        ->addButtons([
            Button::create('Sim')->value('sim'),
            Button::create('Não')->value('não'),
        ]);
        $this->ask($question,function(Answer $resposta){
                $opcao = $resposta; 
                Log::info($opcao);
                if($opcao == 'não'){
                    $this->say('Seja bem vindo! Vamos fazer um cadastro para melhor atendê-lo. 😊');
                    $formulario = Formulario::first();
                    $this->bot->startConversation(new Boasvindas($formulario));
                }elseif($opcao == 'sim'){
                    $this->askEmail();
                }
            
        });
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
