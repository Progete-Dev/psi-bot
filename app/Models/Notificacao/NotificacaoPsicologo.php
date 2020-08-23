<?php
namespace App\Models;

use App\Models\Notificacao\Notificacao;
use App\Models\Psicologo\Psicologo;
use Illuminate\Database\Eloquent\Model;

class NotificacaoPsicologo extends Model
{
    protected $guarded = [];
    protected $table = 'notificacao_psicologos';

    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class,'psicologo_id','id');
    }
    public function notificacao(){
        return $this->belongsTo(Notificacao::class,'notificacao_id','id');
    }


}