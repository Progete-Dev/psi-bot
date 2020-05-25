<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'formulario_atendimentos';
    protected $fillable =[
        'titulo',
    ];

    public function campos(){
        return $this->hasMany(CampoFormulario::class,'formulario_id','id');
    }

    

}
