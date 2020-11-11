<?php

namespace App\Conversations;
use App\Models\Cliente\Cliente;
use App\Models\Formulario\Formulario;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\Validator;

class ExampleConversation extends Conversation
{
    use GeraPergunta;
    protected $firstname;

    protected $email;
    protected $user;
    public function askFirstname()
    {

        $this->say('Olá, Me chamo Maju! Sou a Assistente virtual do Papo.');
        $question = Question::create('É a primeira vez que você fala comigo?')
        ->fallback('Algo deu errado')
        ->callbackId('primeiro_contato')
        ->addButtons([
            Button::create('Sim')->value('sim'),
            Button::create('Não')->value('não'),
        ]);
        $this->ask($question,function(Answer $resposta){
                $opcao = $resposta;
                if($opcao == 'sim'){
                    $this->say('Seja bem vindo! Vamos fazer um cadastro para melhor atendê-lo. 😊');
                    $formulario = Formulario::first();
                    $this->bot->startConversation(new Boasvindas($formulario));
                }elseif($opcao == 'não'){
                    $this->askEmail();
                }
            
        });
    }

    public function askEmail()
    {
        $this->ask('Qual seu email pra te identificar nos nossos arquivos?', function(Answer $answer) {
            $validator = Validator::make(['email' =>  $answer->getText()], [
                'email' => 'required|email|exists:clientes,email',
            ]);
            
            if($validator->fails()){
               
                $this->say('Seu email é invalido 😐');
                return $this->askEmail();
            }
            
            $this->email = $answer->getText();
            $this->user = Cliente::where([
                'email' => $this->email
            ])->first();

            if($this->user != null){
                return $this->mostrarOpcoes();
            }
        });
    }
    public function mostrarOpcoes(){
        
        $opcoes = [
            "agendar",                   
            "remarcar",
            "cancelar",
        ];

        $pergunta = $this->geraPergunta(
            'Vimos que você já tem cadastro. Você quer agendar, remarcar ou cancelar um atendimento? ',
            $opcoes
        );

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

        $this->askFirstname();
        
    }
    
    // $botman->fallback(function($bot) {
    //     $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
    // });
}
