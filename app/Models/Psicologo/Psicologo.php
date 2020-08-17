<?php

namespace App\Models\Psicologo;


use App\Models\Atendimento\Atendimento;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Psicologo extends User
{
    use Notifiable, UsesGoogleCalendar;

    protected $guarded = [];

    public function atendimentos(){
        return $this->hasMany(Atendimento::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }
}
