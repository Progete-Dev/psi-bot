<?php

namespace App\Jobs;

use App\Models\Atendimento\Agendamento;
use App\Models\Notificacao\Notificacao;
use App\Models\NotificacaoPsicologo;
use App\Notifications\NotificaPsicologos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NovaSolicitacao implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $solicitacao;

    public function __construct(Agendamento $solicitacao)
    {
        $this->solicitacao = $solicitacao;
    }

    public function handle()
    {
        Db::beginTransaction();
        $psicologo = $this->solicitacao->horario->psicologo;
            $notificacao = Notificacao::create([
                'mensagem' => 'Nova Solicitação de Atendimento',
                'meta_data' => ['solicitacao_id' => $this->solicitacao->id],
            ]);
            $notificacao = NotificacaoPsicologo::create([
                'psicologo_id' => $psicologo->id,
                'notificacao_id' => $notificacao->id,
                'notificado' => false
            ]);
        $psicologo->notify(new NotificaPsicologos($notificacao->notificacao));
        Db::commit();
    }
}
