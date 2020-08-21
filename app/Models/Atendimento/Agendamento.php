<?php
namespace App\Models\Atendimento;

use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Horario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    const PENDENTE = 1;
    const AGENDADO = 2;
    const CANCELADO = 3;
    const FINALIZADO = 4;

    protected $guarded = [];
    protected $casts = [
        'data_agendada' => 'datetime'
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function horario(){
        return $this->belongsTo(Horario::class,'horario_id','id');
    }

    public function scopeWithAgendamentosSince($query,$date){
        return $query->where('agendamentos.data_agendada','>=',$date);
    }
    public function scopeWithAgendamentosUntil($query,$date){
        return $query->where('agendamentos.data_agendada','<=',$date);
    }
    public function scopeParaPsicologo($query,$id){
        /** @var Builder $query */
        return $query->join('horario_psicologos','horario_id','=','horario_psicologos.id')->where('horario_psicologos.psicologo_id',$id)
            ->select(['agendamentos.*','horario_psicologos.psicologo_id','horario_psicologos.dia_semana','horario_psicologos.hora_inicio','horario_psicologos.hora_final']);
    }

}