<?php

namespace App\Models;

use App\Models\Atendimento\Atendimento;
use Illuminate\Database\Eloquent\Model;

class NotificacaoDeAtendimento extends Model
{
    protected $guarded = [];
    protected $table = 'notificacao_atendimentos'

    protected atendimento()
    {
        return $this->public function belongsTo(Atendimento::class);
    }
}
