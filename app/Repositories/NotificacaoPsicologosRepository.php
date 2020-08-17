<?php
namespace App\Repositories;

use App\Models\NotificacaoPsicologo;


class NotificacaoPsicologosRepository extends BaseRepository
{

    public function  __construct(NotificacaoPsicologo  $model){
        $this->model = $model;
    }

}