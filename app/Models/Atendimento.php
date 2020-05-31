<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atendimento extends Model
{
    const AGUARDA_PSICOLOGO = 1;
    const AGUARDA_HORARIO   = 2;
    const EM_ATENDIMENTO    = 3;
    const CONCLUIDO         = 4;
    const REMARCADO         = 5;
    const CANCELADO         = 6;
    
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
