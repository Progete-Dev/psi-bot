<?php

namespace App\Http\Livewire;

use App\Models\Psicologo\Horario;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;

class Calendar extends Component
{
    public $dateSelect;
    public $month;
    public $weekDays = ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'];
    public $controlDate;

    protected $casts = [
        'controlDate' => 'date'
    ];

    public function mount()
    {
        $this->controlDate = Carbon::now()->firstOfMonth();
    }

    public function next()
    {
        $this->controlDate->addMonth();

    }

    public function prev()
    {
        $this->controlDate->subMonthsNoOverflow();
    }
    public function selectDate($date)
    {
        $this->dateSelect = $date;
    }

    public function render()
    {
        $days = CarbonPeriod::create($this->controlDate->copy()->firstOfMonth(),$this->controlDate->copy()->lastOfMonth());
        $this->month = $this->controlDate->monthName;
        $horarios = [];
        if($this->dateSelect != null){
            $data = Carbon::parse($this->dateSelect);
            $horarios = Horario::paraDia($data)->with('psicologo')->get( );
        }
        return view('livewire.calendar',['days' => $days,'horarios' => $horarios]);
    }
}
