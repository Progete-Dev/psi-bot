<?php

namespace App\Models\Psicologo;

use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Horario extends Model
{
    protected $table = 'horario_psicologos';
    protected $guarded = [];


    public function psicologo(){
        return $this->belongsTo(Psicologo::class,'psicologo_id','id');
    }

    public function eventos(){
        return $this->hasMany(Evento::class,'horario_id','id');
    }
    public function solicitacoes(){
        return $this->hasMany(Agendamento::class,'horario_id','id');
    }
    public function scopeParaDia($query,$dia){
        return $query->where('dia_semana',$dia->dayOfWeek)
            ->whereRaw(DB::raw("(SELECT COUNT(*) FROM eventos WHERE eventos.horario_id = horario_psicologos.id and eventos.final >= '{$dia->endOfDay()}' and eventos.inicio >= '".now()->startOfDay()."') = 0"))
            ->whereRaw(DB::raw("(SELECT COUNT(*) FROM agendamentos WHERE agendamentos.horario_id = horario_psicologos.id and agendamentos.data_agendada >= '{$dia->startOfDay()}' and agendamentos.data_agendada < '".$dia->endOfDay()."') = 0"));
    }


}
