<?php

namespace App\Http\Livewire;

use App\Facades\GoogleCalendar;
use App\Models\Atendimento\Atendimento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Agenda extends Component
{
    public $atendimentoId;
    public $openModal;
    public $events;

    protected $casts = [
        'events' => 'collection'
    ];
    protected $listeners = [
        'open-details-modal' => 'openDetails',
    ];
    public function mount(){
        $this->atendimentoId = null;
        $this->openModal = false;
        $date = Carbon::now();
        $this->events = collect([]);
        if(isset(Auth::user()->googleAuth) and !Auth::user()->googleAuth->expired) {
            $this->events = GoogleCalendar::getEvents(Auth::user(), $date->copy()->startOfYear(),$date->copy()->endOfYear());
        }
    }
    public function render()
    {

        return view('livewire.agenda');
    }
    public function openDetails($eventId){
        $this->atendimentoId = $eventId;
        $this->openModal = true;
    }
    public function closeDetails(){
        $this->atendimentoId = null;
        $this->openModal = false;
    }
    public function getAtendimentoProperty(){
        return Atendimento::where('google_calendar_id',$this->atendimentoId)->first();
    }

    public function getGoogleUrlProperty(){
        return GoogleCalendar::getAuthUrl();
    }
    public function deleteEvent(){
        Db::beginTransaction();
            $atendimento = $this->getAtendimentoProperty();
            dd($atendimento);
            $response = GoogleCalendar::delete($atendimento);
            dd($response);
        Db::commit();
    }
    public function newEvent(){
        Db::beginTransaction();
        $atendimento = factory(Atendimento::class)->create([
            'psicologo_id' => Auth::user()->id,
            'data_atendimento' => Carbon::create(2020,8,14,10,0,0),
            'inicio_atendimento' => Carbon::create(2020,8,14,10,0,0),
            'final_atendimento' => Carbon::create(2020,8,14,11,0,0)
        ]);

        $event = GoogleCalendar::addEvent($atendimento);
        $atendimento->google_calendar_id = $event->id;
        $atendimento->save();
        Db::commit();
    }

}
