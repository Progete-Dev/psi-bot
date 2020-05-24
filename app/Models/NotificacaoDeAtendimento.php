<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacaoDeAtendimento extends Model
{
    protected $fillable = [
        'cliente_id',
        'mensagem',
        'atendimento_id'
    ];

    public function cliente(){
        return $this->belongsTo(User::class,'cliente_id','id');
    }

    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id','id');
    }
}
