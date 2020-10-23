<?php
namespace App\Models\Atendimento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Horario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model{

    const WEEKDAYS = [
        'SU',
        'MO',
        'TU',
        'WE',
        'TH',
        'FR',
        'SA'
    ];
    protected $guarded = [];
    protected $casts = [
        'recorrencia' => 'array',
        'hora_inicio' => 'datetime',
        'hora_final'  => 'datetime'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
    public function horario(){
        return $this->belongsTo(Horario::class,'horario_id','id');
    }
    public function atendimentos(){
        return $this->hasMany(Atendimento::class,'evento_id','id');
    }
    public function scopeWithEventosUntil($query,$date){
        return $query->where('eventos.final','<=',$date->startOfDay());
    }
    public function scopeWithEventosSince($query,$date){
        return $query->where('eventos.inicio','>=',$date->endOfDay());
    }
    public function scopeWithHorario($query,$dia_semana){
        return $query->join('horario_psicologos','horario_id','=','horario_psicologos.id')->where('horario_psicologos.dia_semana',$dia_semana)
            ->select(['eventos.*','horario_psicologos.psicologo_id','horario_psicologos.dia_semana','horario_psicologos.hora_inicio','horario_psicologos.hora_final']);
    }
    public function scopeParaPsicologo($query,$id){
        /** @var Builder $query */
        return $query->join('horario_psicologos','horario_id','=','horario_psicologos.id')->where('horario_psicologos.psicologo_id',$id)
            ->select(['eventos.*','horario_psicologos.psicologo_id','horario_psicologos.dia_semana','horario_psicologos.hora_inicio','horario_psicologos.hora_final']);
    }



}