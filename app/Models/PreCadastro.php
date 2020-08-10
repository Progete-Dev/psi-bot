<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreCadastro extends Model
{
    
    const PRE_CADASTRO = 1;
    const EM_ANALISE = 2;
    const APROVADO = 3;
    const REPROVADO = 1;
    protected $guarded = [];
    

}
