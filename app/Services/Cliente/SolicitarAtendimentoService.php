<?php
namespace App\Services\Cliente;

use App\Repositories\AtendimentoRepository;
use App\Services\BaseService;

class SolicitarAtendimentoService extends BaseService
{
    public function __construct(AtendimentoRepository $repo){
        $this->repo = $repo;
    }
}