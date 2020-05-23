<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacaoDeAtendimento extends Model
{
    protected $fillable = [
        'cliente_id',
        'mensagem'
    ];

    public function cliente(){
        return $this->belongsTo(User::class,'cliente_id','id');
    }
}
