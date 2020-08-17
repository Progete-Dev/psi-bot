<?php

namespace App\Models\Cliente;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Atendimento;
use App\Models\Formulario\RespostaFormulario;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;


class Cliente extends User
{
    use Authenticatable,Notifiable;

    protected $guarded = [];

    public function atendimentos(){
        return $this->hasMany(Atendimento::class);
    }
    public function agendamentos(){
        return $this->hasMany(Agendamento::class,'cliente_id','id');
    }
    public function respostas(){
        return $this->hasMany(RespostaFormulario::class);
    }
}
