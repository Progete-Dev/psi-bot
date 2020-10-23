<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DatePicker extends Component
{
    public $minData;

    public function __construct($minDate = null)
    {
        $this->minDate = $minDate;
    }

    public function render()
    {
        return view('components.date-picker',[
            'minDate' => $this->minDate
        ]);
    }
}
