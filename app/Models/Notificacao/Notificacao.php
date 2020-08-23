<?php
namespace App\Models\Notificacao;

use Illuminate\Database\Eloquent\Model;


class Notificacao extends Model
{
    protected $guarded = [];
    protected $table = "notificacoes";
    protected  $casts = [
        'meta_data' => 'array'
    ];

}