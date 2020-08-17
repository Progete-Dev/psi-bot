<?php
namespace App\Repositories;

use App\Models\Psicologo\PreCadastro;

class PreCadastroRepository extends BaseRepository
{

    public function  __construct(PreCadastro  $model){
        $this->model = $model;
    }
}