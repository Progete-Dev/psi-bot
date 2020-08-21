<?php
namespace App\Models\Atendimento;
use App\Models\Cliente\Cliente;
use Illuminate\Database\Eloquent\Model;

class TokenLink extends Model{

    protected $guarded = [];
    protected  $casts  = [
        'expires_at' => 'datetime'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }



}