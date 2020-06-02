<?php

namespace App\Conversations;

use App\Jobs\GeraAtendimento;
use App\Models\Formulario;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Boasvindas extends Conversation
{
    protected $formulario;
    protected $campo;
    protected $respostas ;

    public function __construct($formulario)
    {
        $this->formulario = $formulario;
        
    }

    public function pegaResposta($valido = null){
        if($valido == true){
            $this->campo = $this->formulario->campos->shift();
        }else{
            $this->say('Resposta inválida');
        }
        if($this->campo == null){
            $this->ask('Para completar o seu cadastro precisammos que informe um Email',function(Answer $resposta){
                $validator = Validator::make(['email' =>  $resposta->getText()], [
                    'email' => 'required|unique:users|email',
                    
                ]);
    
                if($validator->fails()){
                      return $this->pegaResposta(false);
                }  
                $this->email = $resposta->getText();
                
                $this->ask('Qual motivo para o seu contato conosco?',function(Answer $resposta){
                    GeraAtendimento::dispatch($this->respostas,$this->email,$resposta->getText());
                });
                $this->say('Suas informações foram cadastradas com sucesso!');

            });            
            return ;
        }

        switch($this->campo->tipo){
            case 1:
                $this->ask($this->campo->nome.( $this->campo->obrigatorio == true ? ' (Obrigatório): ' : ': '),function(Answer $resposta){
                    return $this->resposta($resposta);
                });
                break;
            case 2:
                $opcoes = [];
                
                foreach($this->campo->opcoesArray() as $opcao){
                    $opcoes []= Button::create($opcao->nome)->value($opcao->valor);
                }

                $pergunta = Question::create($this->campo->nome.": ")
                ->fallback('Opção Inválida')
                ->callbackId(Str::slug($this->campo->nome))
                ->addButtons($opcoes);
                $this->ask($pergunta,function(Answer $resposta){
                    return $this->resposta($resposta);
                });
            break;
            case 3:
                $opcoes = [];
                
                foreach($this->campo->opcoesArray() as $opcao){
                    $opcoes []= Button::create($opcao->nome)->value($opcao->valor);
                }

                $pergunta = Question::create($this->campo->nome.": ")
                ->fallback('Opção Inválida')
                ->callbackId(Str::slug($this->campo->nome))
                ->addButtons($opcoes);
                $this->ask($pergunta,function(Answer $resposta){
                    return $this->resposta($resposta);
                });
            break;
            case 4:
                $opcoes = [];
                
                foreach($this->campo->opcoesArray() as $opcao){
                    $opcoes []= Button::create($opcao->nome)->value($opcao->valor);
                }

                $pergunta = Question::create($this->campo->nome.": ")
                ->fallback('Opção Inválida')
                ->callbackId(Str::slug($this->campo->nome))
                ->addButtons($opcoes);
                $this->ask($pergunta,function(Answer $resposta){
                    return $this->resposta($resposta);
                });
            break;

            case 5:
                $this->ask($this->campo->nome.':',function(Answer $resposta){
                    return $this->resposta($resposta);
                });
            break;
        }
    }


    public function resposta(Answer $resposta){
        $valido = true;
        $validator = Validator::make([Str::slug($this->campo->nome) =>  $resposta->getText()], [
            Str::slug($this->campo->nome) => $this->campo->validacao,
            
        ]);

        if($validator->fails()){
           $valido =false;
        }
        $this->respostas []= [
            'formulario_id' => $this->formulario->id,
            'campo_id' => $this->campo->id,
            'resposta' => $resposta->getText()
        ];

        return $this->pegaResposta($valido);
    }
    public function run()
    {
        $this->respostas = [];
        $this->pegaResposta(true);
    }
}
