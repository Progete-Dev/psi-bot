<?php

namespace App\Http\Livewire;

use App\Models\Atendimento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardAtendimentos extends Component
{
    public $index = 0;
    public $atendimentos;
    

    public function mount(){
        $this->atendimentos = Atendimento::where('psicologo_id',auth()->user()->id)
        ->get()
        ->map(function($atendimento){
            return $atendimento->id;
        })->toArray();
        
    }
    public function getAtendimentoProperty(){
        return Atendimento::find($this->atendimentos[$this->index]);
    }
    public function render()
    {        
        return view('livewire.card-atendimentos');
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
