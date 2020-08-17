<?php
namespace App\Services\Psicologo;

use App\Repositories\PreCadastroRepository;
use App\Services\BaseService;

class PreCadastroService extends BaseService
{
    public function __construct(PreCadastroRepository $repo)
    {
        $this->repo = $repo;
    }

}