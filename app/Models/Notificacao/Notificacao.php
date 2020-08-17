<?php
namespace App\Models\Notificacao;

use Illuminate\Database\Eloquent\Model;


class Notificacao extends Model
{
    protected $guarded = [];

    protected  $casts = [
        'meta_data' => 'array'
    ];
}