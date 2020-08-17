<?php
namespace App\Repositories;

use App\Models\Psicologo\Psicologo;

class PsicologoRepository extends BaseRepository
{
    public function  __construct(Psicologo  $model)
    {
        $this->model = $model;
    }

}