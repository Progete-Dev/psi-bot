<?php


namespace App\Repositories;
use App\Models\Atendimento\Evento;

class EventoRepository extends BaseRepository
{
    public function __construct(Evento $model){
        $this->model = $model;
    }
}