<?php

namespace App\Models\Psicologo;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Horario extends Model
{
    protected $table = 'horario_psicologos';
    protected $guarded = [];
    protected $casts = [
        'hora_inicio' => 'datetime',
        'hora_final'  => 'datetime'
    ];

    public function psicologo(){
        return $this->belongsTo(Psicologo::class,'psicologo_id','id');
    }

    public function eventos(){
        return $this->hasMany(Evento::class,'horario_id','id');
    }
    public function solicitacoes(){
        return $this->hasMany(Agendamento::class,'horario_id','id');
    }
    public function scopeParaDia(Builder $query,$dia) {
        $query->where('dia_semana', $dia->dayOfWeek);
    }

}
