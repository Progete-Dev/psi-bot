<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class NotificacaoPsicologo extends Model
{
    protected $fillable = [
        'notificacao_id',
        'psicologo_id',
        'notificado',
    ];

    public function psicologo(){
        return $this->belongsTo(User::class,'psicologo_id','id');
    }

    public function notificacao(){
        return $this->belongsTo(NotificacaoDeAtendimento::class,'notificacao_id','id');
    }
}