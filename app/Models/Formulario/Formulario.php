<?php

namespace App\Models\Formulario;


use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    const INFORMACOES_PESSOAIS = 1;
    protected $table = 'formulario_atendimentos';
    protected $fillable =[
        'titulo',
    ];

    public function campos(){
        return $this->hasMany(CampoFormulario::class,'formulario_id','id');
    }

    

}
