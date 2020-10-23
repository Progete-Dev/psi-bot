<?php

namespace App\Http\Livewire\Psicologo\Agenda;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RRule\RRule;

class Calendario extends Component
{
    public $month;
    public $year;
    public $days;
    public $months;
    public $week;
    public $viewMode;
    public $events;

    public function mount(){
        $date = Carbon::now();
        $this->month = $date->month;
        $this->year  = $date->year;
        $this->viewMode  = 1;
        $this->week = $date->weekOfYear;
        $this->days = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $this->months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];


    }
    public function eventosPara($events,$day){
        if(!isset($events[$day->dayOfWeek])){
            return [];
        }
        $dayEvents= collect($events[$day->dayOfWeek])->filter(function($evento) use ($day){
            if(isset($evento['recorrencia'])) {
                $dataEvento = Carbon::createFromTimeString($evento['inicio']);
                $date = Carbon::create($day->year,$day->month,$day->day,$dataEvento->hour,$dataEvento->minute,$dataEvento->second);
                if(count($evento['recorrencia']) > 0) {
                    $rrule = new RRule($evento['recorrencia']);
                    $recorrencias = $rrule->getOccurrences();
                    foreach ($recorrencias as $recorrencia) {
                        $recorrencia = Carbon::parse($recorrencia);
                        if ($recorrencia->day == $date->day and $recorrencia->month == $date->month and $recorrencia->year == $date->year) {
                            return true;
                        }
                    }
                    return false;
                }else{
                    return $dataEvento->day == $date->day and $dataEvento->month == $date->month and $dataEvento->year == $date->year;
                }
            }else{
                $dataEvento = Carbon::createFromTimeString($evento['data_agendada']);
                $date = Carbon::create($day->year,$day->month,$day->day,$dataEvento->hour,$dataEvento->minute,$dataEvento->second)->timezone('America/Sao_Paulo');
                return $dataEvento->day == $date->day and $dataEvento->month == $date->month and $dataEvento->year == $date->year;
            }

        });
        if($this->viewMode != 1){
            $dayEvents = $dayEvents->groupBy(function ($evento) {
                if(isset($evento['recorrencia'])) {
                    $dataEvento = Carbon::createFromTimeString($evento['inicio']);

                    return $dataEvento->hour;
                }else{

                    $dataEvento = Carbon::createFromTimeString($evento['data_agendada']);
                    return $dataEvento->hour;
                }

            });

        }
        return $dayEvents;
    }
    public function today(){
        $date = Carbon::now();
        $this->month = $date->month;
        $this->year  = $date->year;
        $this->week  = $date->weekOfYear;
    }

    public function nextMonth(){
        if($this->viewMode == 1) {
            if ($this->month < 12) {
                $this->month++;
            }
        }else{
            if($this->week <= now()->endOfYear()->weekOfYear) {
                $this->week++;
            }
        }
    }
    public function prevMonth(){
        if($this->viewMode == 1) {
            if ($this->month > 1) {
                $this->month--;
            }
        }else{
            if($this->week >= 1) {
                $this->week--;
            }
        }
    }

    public function openDetails($eventId,$event=true,$day,$month,$year)
    {
        $this->emitUp('open-details-modal',$eventId,$event,$day,$month,$year);
    }
    public function render()
    {
        $daysList  =[ ];
        if($this->viewMode == 1) {
            $firstDay = Carbon::create($this->year, $this->month, 1)->startOfWeek()->subDay();
            $this->week = $firstDay->week;
        }else{
            $date = Carbon::now();
            $firstDay = $date->setISODate($this->year,$this->week)->startOfWeek()->subDay()->copy();
            $this->month = $firstDay->month;
        }

        $lastDay = null;

        if($this->viewMode == 1){
            $lastDay = Carbon::create($this->year,$this->month,1)->lastOfMonth();
        }else{
            $date = Carbon::now();
            $lastDay = $date->setISODate($this->year,$this->week)->endOfWeek()->subDay()->copy();
        }

        $betweenMonths = $firstDay->month != $lastDay->month;
        for($i = 0 ; $i < 7 ; $i++){
            $daysList[$this->days[$i]] = [];
        }

        $date = $firstDay->copy();
        $count = ( ($firstDay->day  != 1 and $firstDay->month != $lastDay->month) ? $firstDay->day - $firstDay->copy()->endOfMonth()->day : $firstDay->day);
        $firstDay = false;
        $atendimentos = Evento::paraPsicologo(Auth::user()->id)
            ->withEventosSince($date)
            ->withEventosUntil($lastDay->endOfDay())
            ->with('cliente')
            ->get();
        $solicitacoes = Agendamento::paraPsicologo(Auth::user()->id)
            ->withAgendamentosSince($date)
            ->withAgendamentosUntil($lastDay->endOfDay())
            ->where('status','<',Agendamento::AGENDADO)
            ->with('cliente')
            ->get();
        $events =$atendimentos->mergeRecursive($solicitacoes)->groupBy(function ($event){
            return $event->dia_semana;
        })->toArray();
        while($count <= $lastDay->day){
            if($date->day ==1){
                $firstDay = true;
            }

            $daysList[$this->days[$date->dayOfWeek]] []= [
                'day' =>$date->day,
                "month" => $date->month,
                'firstDay' => $firstDay,
                'events' => $this->eventosPara($events,$date)
            ] ;

            $date = $date->copy()->addDay();

            $count++;
        }


        if($this->viewMode == 1) {
            foreach ($this->days as $day) {
                if (count($daysList[$day]) < 6) {
                    $diff = 6 - count($daysList[$day]);
                    while($diff--) {
                        $daysList[$day] [] = [
                            'day' => "",
                            'month' => "",
                            'firstDay' =>false,
                        ];
                    }
                }
            }
        }


        return view('livewire.psicologo.agenda.calendario',[
            'betweenMonths' => $betweenMonths,
            'daysList' => $daysList
        ]);
    }
}
