<?php
namespace App\Repositories;


use App\Models\Atendimento\Atendimento;

class AtendimentoRepository extends BaseRepository
{

    public function  __construct(Atendimento  $model){
        $this->model = $model;
    }
}