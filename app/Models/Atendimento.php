<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    const AGUARDA_PSICOLOGO = 0;
    const AGUARDA_HORARIO   = 1;
    const EM_ATENDIMENTO    = 2;
    const CONCLUIDO         = 3;
    const REMARCADO         = 4;
    const CANCELADO         = 5;
    
    protected $fillable = [
        'cliente_id',
        'psicologo_id',
        'data_atendimento',
        'tempo_atendimento',
        'status'
    ];
    protected $dates = [
        'data_atendimento'
    ];
    
    public function cliente(){
        return $this->belongsTo(User::class,'cliente_id','id');
    }

    public function psicologo(){
        return $this->belongsTo(User::class,'psicologo_id','id');
    }

    public function anotacoes(){
        return $this->hasMany(AnotacaoAtendimento::class,'atendimento_id','id');
    }
}
