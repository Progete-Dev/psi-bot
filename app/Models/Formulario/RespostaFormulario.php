<?php

namespace App\Models\Formulario;

use App\Models\Cliente\Cliente;
use Illuminate\Database\Eloquent\Model;

class RespostaFormulario extends Model
{
    protected $guarded = [];

    public function  cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }

    public function campo(){
        return $this->belongsTo(CampoFormulario::class,'campo_id','id');
    }


}
