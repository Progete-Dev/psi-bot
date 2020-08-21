<?php

namespace App\Models\Psicologo;


use App\Models\Atendimento\Atendimento;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Psicologo extends Authenticatable
{
    use Notifiable, UsesGoogleCalendar;
    protected $guard = 'psicologo';
    protected $guarded = [];

    public function atendimentos(){
        return $this->hasMany(Atendimento::class);
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }
}
