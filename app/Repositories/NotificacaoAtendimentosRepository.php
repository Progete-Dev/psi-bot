<?php
namespace App\Repositories;

use App\Models\NotificacaoDeAtendimento;

class NotificacaoAtendimentosRepository extends BaseRepository
{

    public function  __construct(NotificacaoDeAtendimento  $model){
        $this->model = $model;
    }

}