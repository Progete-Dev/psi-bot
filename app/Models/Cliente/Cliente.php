<?php

namespace App\Models\Cliente;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use App\Models\Formulario\Formulario;
use App\Models\Formulario\RespostaFormulario;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $guard = 'cliente';
    public function atendimentos(){
        return $this->hasMany(Evento::class);
    }
    public function agendamentos(){
        return $this->hasMany(Agendamento::class,'cliente_id','id');
    }

    public function getFormulariosAttribute(){
        return Formulario::all();
    }
    public function respostas(){
        return $this->hasMany(RespostaFormulario::class);
    }
}
