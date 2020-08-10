<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class NotificacaoPsicologo extends Model
{

    public $dates = [
        'created_at'
    ];
    protected $guarded = [];

    public function psicologo(){
        return $this->belongsTo(User::class,'psicologo_id','id');
    }

    public function notificacao(){
        return $this->belongsTo(NotificacaoDeAtendimento::class,'notificacao_id','id');
    }
}