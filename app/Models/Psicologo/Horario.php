<?php

namespace App\Models\Psicologo;

use App\Models\Atendimento\Agendamento;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario_psicologos';
    protected $guarded = [];

    public function psicologo(){
        return $this->belongsTo(Psicologo::class,'psicologo_id','id');
    }

    public function eventos(){
        return $this->hasMany(Agendamento::class,'horario_id','id');
    }

}
