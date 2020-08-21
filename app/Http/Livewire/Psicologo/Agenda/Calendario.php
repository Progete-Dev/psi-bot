<?php

namespace App\Http\Livewire\Psicologo\Agenda;

use Carbon\Carbon;
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

    public function mount($events){
        $date = Carbon::now();
        $this->month = $date->month;
        $this->year  = $date->year;
        $this->viewMode  = 1;
        $this->week = $date->weekOfYear;
        $this->days = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $this->months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $this->events = $events;

    }
    public function eventosPara($events,$day){
        if(!isset($events[$day->dayOfWeek])){
            return [];
        }
        $dayEvents= collect($events[$day->dayOfWeek])->filter(function($evento) use ($day){
            if(isset($evento['recorrencia'])) {
                $dataEvento = Carbon::parseFromLocale($evento['inicio']);
                $date = Carbon::create($day->year,$day->month,$day->day,$dataEvento->hour,$dataEvento->minute,$dataEvento->second)->timezone('America/Sao_Paulo');
                if(count($evento['recorrencia']) > 0) {
                    $rrule = new RRule($evento['recorrencia']);
                    $recorrencias = $rrule->getOccurrences();

                    foreach ($recorrencias as $recorrencia) {
                        $recorrencia = Carbon::parse($recorrencia);
                        if ($recorrencia->day == $date->day and $recorrencia->month == $date->month and $recorrencia->year == $date->year) {
                            return true;
                        }
                    }
                }else{
                    if ($dataEvento->day == $date->day and $dataEvento->month == $date->month and $dataEvento->year == $date->year) {
                        return true;
                    }
                }
            }else{
                $dataEvento = Carbon::parseFromLocale($evento['data_agendada']);
                $date = Carbon::create($day->year,$day->month,$day->day,$dataEvento->hour,$dataEvento->minute,$dataEvento->second)->timezone('America/Sao_Paulo');
                return $dataEvento->day == $date->day && $dataEvento->month == $date->month;

            }
            return false;
        });
        if($this->viewMode != 1){
            $dayEvents = $dayEvents->groupBy(function ($evento) {
                if(isset($evento['recorrencia'])) {
                    $dataEvento = Carbon::parseFromLocale($evento['inicio']);

                    return $dataEvento->hour;
                }else{
                    $dataEvento = Carbon::parseFromLocale($evento['data_agendada']);
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

    public function openDetails($eventId,$event=true)
    {
        $this->emitUp('open-details-modal',$eventId,$event);
    }
    public function render()
    {
        $daysList  =[ ];
        $events = collect($this->events);
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
