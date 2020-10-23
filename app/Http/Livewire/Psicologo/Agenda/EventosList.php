<?php

namespace App\Http\Livewire\Psicologo\Agenda;

use Carbon\Carbon;
use Livewire\Component;

class EventosList extends Component
{
    public $events;
    public $action;
    public function mount($events,$action){
        $this->action = $action;
        $this->events = $events->toArray();
    }
    public function dispatchEventAction($event,$index)
    {
        if(isset($this->events[$index]['data_agendada'])) {
            $data = Carbon::createFromTimeString($this->events[$index]['data_agendada']);
        }else{
            $data = Carbon::createFromTimeString($this->events[$index]['inicio']);
        }
        $this->emit($this->action,$event,$data->day,$data->month,$data->year);
    }
    public function render()
    {
        return view('livewire.psicologo.agenda.eventos-list');
    }

}
