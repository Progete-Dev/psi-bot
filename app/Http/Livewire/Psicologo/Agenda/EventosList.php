<?php

namespace App\Http\Livewire\Psicologo\Agenda;

use Livewire\Component;

class EventosList extends Component
{
    public $events;
    public $action;
    public function mount($events,$action){
        $this->action = $action;

        $this->events = $events->toArray();
    }
    public function dispatchEventAction($event)
    {

        $this->emit($this->action,$event);
    }
    public function render()
    {
        return view('livewire.psicologo.agenda.eventos-list');
    }

}
