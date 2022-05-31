<?php

namespace App\Jobs;


use App\Models\Formulario\RespostaFormulario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class GeraAtendimento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $respostas;
    protected $clienteId;
    public function __construct($respostas,$clienteId)
    {

        $this->respostas = $respostas;
        $this->clienteId = $clienteId;


    }


    public function handle()
    {
        
        Db::beginTransaction();
dd($this->respostas);
        foreach ($this->respostas as $resposta) {
            RespostaFormulario::insert([
                'formulario_id' => $resposta['formulario_id'],
                'campo_id'      => $resposta['campo_id'],
                'cliente_id'    => $this->clienteId,
                'resposta'      => $resposta['resposta']
            ]);
        }
        Db::commit();
    }
}
