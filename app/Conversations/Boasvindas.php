<?php

namespace App\Conversations;

use App\Facades\TokenLink;
use App\Jobs\GeraAtendimento;
use App\Models\Cliente\Cliente;
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

    public function  __construct($formulario)
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
                $email = $resposta->getText();
                
                $this->ask('Qual motivo para o seu contato conosco?',function(Answer $resposta) use($email){
                    $user = $this->getBot()->getUser();
                    $cliente = Cliente::create([
                        'nome' => $this->respostas[0]['resposta'],
                        'email' => $this->email,
                        'telefone' => $user->getId(),
                        'whatsapp' => true,
                        'motivo' => $resposta->getText(),
                    ]);
                    GeraAtendimento::dispatch($this->respostas,$cliente->id);
                    $this->say('Suas informações foram cadastradas com sucesso!');
                    return $this->bot->startConversation(new AtendimentoConversation($cliente));
                });

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
        $opcao = null;

        if($this->campo->tipo > 1 and $this->campo->tipo < 5){
            $opcao = collect($this->campo->opcoesArray())->where('valor',$resposta->getText())->first();
            if($opcao === null){
                $valido = false;
            }else{
                $opcao = $opcao->nome;
            }
        }else {
            $validator = Validator::make([Str::slug($this->campo->nome) => $resposta->getText()], [
                Str::slug($this->campo->nome) => $this->campo->validacao,

            ]);
            if ($validator->fails()) {
                $valido = false;
            }else{
                $opcao = $resposta->getText();
            }

        }
        if($valido == true) {
            $this->respostas [] = [
                'formulario_id' => $this->formulario->id,
                'campo_id' => $this->campo->id,
                'resposta' => $opcao
            ];
        }
        return $this->pegaResposta($valido);
    }
    public function run()
    {
        $this->respostas = [];
        $this->pegaResposta(true);
    }
}
