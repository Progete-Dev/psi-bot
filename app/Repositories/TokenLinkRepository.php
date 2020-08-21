<?php
namespace App\Repositories;
use App\Models\Atendimento\TokenLink;

class TokenLinkRepository extends BaseRepository
{
    public function  __construct(TokenLink  $model){
        $this->model = $model;
    }

    public function findByToken($token){
        return $this->model->where('token',$token)->first();
    }
}