<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespostaFormulario extends Model
{
    protected $fillable =[
        'resposta'
    ];

    public function formulario(){
        return $this->belongsTo(Formulario::class,'formulario_id','id');
    }

    public function campo(){
        return $this->belongsTo(CampoFormulario::class,'campo_id','id');
    }

    public function cliente(){
        return $this->belongsTo(User::class,'cliente_id','id');
    }
}
