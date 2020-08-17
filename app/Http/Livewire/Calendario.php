<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendario extends Component
{
    public $month;
    public $year;
    public $days;
    public $months;
    public $week;
    public $daysList;
    public $viewMode;
    public $events;

    protected $casts = [
      'events' => 'collection'
    ];
    public function mount($events){
        $date = Carbon::now();
        $this->month = $date->month;
        $this->year  = $date->year;
        $this->daysList = [];
        $this->viewMode  = 1;
        $this->week = $date->weekOfYear;
        $this->days = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
        $this->months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $this->events =$events;
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

    public function openDetails($weekDay,$dayIndex,$index,$hour = null)
    {
        if ($this->viewMode == 1){
            $event = $this->daysList[$weekDay][$dayIndex]['events'][$index];
        }else{
            $event = $this->daysList[$weekDay][$dayIndex]['events'][$hour][$index];
        }

        $this->emitUp('open-details-modal',$event['id']);
    }
    public function render()
    {
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
            $this->daysList[$this->days[$i]] = [];
        }

        $date = $firstDay->copy();
        $count = ( ($firstDay->day  != 1 and $firstDay->month != $lastDay->month) ? $firstDay->day - $firstDay->copy()->endOfMonth()->day : $firstDay->day);

        $firstDay = false;
        while($count <= $lastDay->day){
            if($date->day ==1){
                $firstDay = true;
            }
            $dayEvents = $this->events->filter(function($event) use ($date){
                if(isset($event['recurrence']['RFREQ']) and $event['recurrence']['RFREQ'] == "WEEKLY") {

                    return Carbon::parse($event['start'])->dayOfWeek == $date->dayOfWeek;
                }
                return Carbon::parse($event['start'])->day == $date->day;
            });
            if($this->viewMode != 1){
                $dayEvents = $dayEvents->groupBy(function($event){
                   return Carbon::parse($event['start'])->hour;
                });
            }
            $this->daysList[$this->days[$date->dayOfWeek]] []= [
                'day' =>$date->day,
                "month" => $date->month,
                'firstDay' => $firstDay,
                'events'   => $dayEvents->toArray()
            ] ;
            $date = $date->copy()->addDay();

            $count++;
        }


        if($this->viewMode == 1) {
            foreach ($this->days as $day) {
                if (count($this->daysList[$day]) < 6) {
                    $diff = 6 - count($this->daysList[$day]);
                    while($diff--) {
                        $this->daysList[$day] [] = [
                            'day' => "",
                            'month' => "",
                            'firstDay' =>false,
                            'events' => []
                        ];
                    }
                }
            }
        }


        return view('livewire.calendario',[
            'betweenMonths' => $betweenMonths
        ]);
    }
}
