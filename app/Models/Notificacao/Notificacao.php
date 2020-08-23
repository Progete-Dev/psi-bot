<?php
namespace App\Models\Notificacao;

use App\Models\Atendimento\Agendamento;
use Illuminate\Database\Eloquent\Model;


class Notificacao extends Model
{
    protected $guarded = [];
    protected $table = "notificacoes";
    protected  $casts = [
        'meta_data' => 'array'
    ];

    public function getSolicitacao(){
        if(isset($this->meta_data['solicitacao_id'])){
            return Agendamento::find($this->meta_data['solicitacao_id']);
        }
        return null;
    }

}