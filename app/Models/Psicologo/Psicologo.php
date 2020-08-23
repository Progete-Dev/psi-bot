<?php

namespace App\Models\Psicologo;


use App\Models\Atendimento\Atendimento;
use App\Models\Notificacao\Notificacao;
use App\Models\NotificacaoPsicologo;
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

    public function notificacoes(){
        return $this->hasManyThrough(
            Notificacao::class,
            NotificacaoPsicologo::class,
            'psicologo_id',
            'id',
            'id',
            'notificacao_id'
        );
    }

    public function hasNotifications(){
        return $this->notificacoes()->count() > 0;
    }
}
