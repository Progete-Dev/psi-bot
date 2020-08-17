<?php
namespace App\Conversations;

use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Str;

trait GeraPergunta{

    public static function geraPergunta($texto,$campos) : Question{
        $opcoes = [];

        foreach($campos as $index => $opcao){
            if(isset($opcao['info'])) {
                $opcoes [] = Button::create($opcao['text'])->value($index + 1)->additionalParameters($opcao['info']);
            }else {
                $opcoes [] = Button::create($opcao)->value($index + 1);
            }
        }

        $pergunta = Question::create($texto)
            ->fallback('Opção Inválida')
            ->callbackId(Str::slug($texto))
            ->addButtons($opcoes);
        return $pergunta;
    }
}