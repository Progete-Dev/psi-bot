<?php

namespace App\Models\Atendimento;

use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Psicologo;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    const CONFIRMADO = 1;
    const AGUARDA_HORARIO   = 2;
    const AGUARDA_CONFIRMACAO    = 3;
    const CONCLUIDO         = 4;
    const REMARCADO         = 5;
    const CANCELADO         = 6;

    protected  $guarded = [];
    protected $dates = [
        'data_atendimento',
        'inicio_atendimento',
        'final_atendimento'
    ];
    
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function psicologo(){
        return $this->belongsTo(Psicologo::class,'psicologo_id','id');
    }

    public function anotacoes(){
        return $this->hasMany(AnotacaoAtendimento::class,'atendimento_id','id');
    }
}
