<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnotacaoAtendimento extends Model
{
     protected $fillable = [
        'nota'
    ];
    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id','id');
    }

}
