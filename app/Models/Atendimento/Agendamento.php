<?php
namespace App\Models\Atendimento;

use App\Models\Cliente\Cliente;
use App\Models\Psicologo\Horario;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    const PENDENTE = 1;
    const AGENDADO = 2;
    const CANCELADO = 3;
    const FINALIZADO = 4;

    protected $guarded = [];
    protected $casts = [
      'recorrencia' => 'array'
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function horario(){
        return $this->belongsTo(Horario::class,'horario_id','id');
    }
}