<?php

namespace App\Http\Livewire;

use App\Models\Atendimento;
use App\Models\NotificacaoDeAtendimento;
use App\Models\NotificacaoPsicologo;
use App\Notifications\NotificaPsicologos;
use Livewire\Component;

class CardSlider extends Component
{

    public $index;
    public $ids;
    public $card;
    public function next(){
        if($this->index < count($this->ids)-1){
            $this->index++;
        }
    }

    public function prev(){
        if($this->index > 0){
            $this->index--;
        }
    }

    public function goTo($pos){
        $this->index = $pos;
    }

    public function getAtendimentoProperty(){
        return Atendimento::find($this->ids[$this->index]);
    }

    public function getNotificacaoProperty(){
        return NotificacaoDeAtendimento::find($this->ids[$this->index]);
    }

    public function mount($ids,$card){
        $this->ids = $ids;
        $this->card = $card;
        $this->index = 0;
    }
    public function render()
    {
        return view('livewire.card-slider');
    }
}
