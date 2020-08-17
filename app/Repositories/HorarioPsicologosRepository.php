<?php
namespace App\Repositories;
use App\Models\Psicologo\Horario;

class HorarioPsicologosRepository extends BaseRepository
{

    public function  __construct(Horario  $model){
        $this->model = $model;
    }
   
}