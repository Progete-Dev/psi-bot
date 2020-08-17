<?php

namespace App\Jobs;


use App\Models\Atendimento\Atendimento;
use App\Models\Cliente\Cliente;
use App\Models\Formulario\RespostaFormulario;
use App\Models\Notificacao\Notificacao;
use App\Models\NotificacaoDeAtendimento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class GeraAtendimento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $whatsapp;
    protected $respostas;
    protected $email;
    protected $motivo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($whatsapp,$respostas ,$email,$motivo)
    {
        $this->whatsapp = $whatsapp;
        $this->respostas = $respostas;
        $this->email = $email;
        $this->motivo = $motivo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Db::beginTransaction();
        $user = Cliente::create([
            'nome' => $this->respostas[0]['resposta'],
            'email' => $this->email,
            'telefone' => $this->whatsapp,
            'whatsapp' => true,
            'motivo' => $this->motivo,
        ]);

        foreach ($this->respostas as $resposta) {
            RespostaFormulario::insert([
                'formulario_id' => $resposta['formulario_id'],
                'campo_id'      => $resposta['campo_id'],
                'cliente_id'    => $user->id,
                'resposta'      => $resposta['resposta']
            ]);
        }
        $atendimento = Atendimento::create([
            'cliente_id' => $user->id,
            'status' => 1,
            'psicologo_id' => null,
            'data_atendimento' => null
        ])->id;

        $notificacao = Notificacao::create([
            'mensagem' => 'Solicitação de atendimento Cliente: '.$user->nome.' motivo: '. $this->motivo,
            'atendimento_id' =>  $atendimento,
        ])->id;
        NotificacaoDeAtendimento::create([
            'atendimento_id' => $atendimento,
            'notificacao_id' => $notificacao,
        ])->id;
        Db::commit();
    }
}
