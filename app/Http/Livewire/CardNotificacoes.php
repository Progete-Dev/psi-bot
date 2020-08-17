<?php

namespace App\Http\Livewire;

use Livewire\Component;


class CardNotificacoes extends Component
{
    public $notificacao;
    public $index=0;
    public function render()
    {
     
        if(auth()->user()->notificacoes->count()>0){
            $this->notificacao=auth()->user()->notificacoes->toArray()[$this->index];
        }else{
            $this->index=-1;
        }
        return view('livewire.card-notificacoes');
        
    }
    public function anterior()
    {

        $this->index--;
    }
    public function proximo()
    {
        $this->index++;
    }
}
