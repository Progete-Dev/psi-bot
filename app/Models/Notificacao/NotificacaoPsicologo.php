<?php
namespace App\Models;

use App\Models\Psicologo\Psicologo;
use Illuminate\Database\Eloquent\Model;

class NotificacaoPsicologo extends Model
{
    protected $guarded = [];
    protected $table = 'notificacao_psicologos';

    protected psicologo()
    {
        return $this->public function belongsTo(Psicologo::class);
    }
}