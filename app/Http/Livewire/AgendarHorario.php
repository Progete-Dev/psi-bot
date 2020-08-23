<?php

namespace App\Http\Livewire;

use App\Facades\TokenLink;
use App\Models\Notificacao\Notificacao;
use App\Models\NotificacaoPsicologo;
use App\Models\Psicologo\Horario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AgendarHorario extends Component
{
    use WithPagination;
    public $data;
    public $slot;
    public $motivo;
    public $showHorarios = false;
    public $token;
    public $status;

    protected $updatesQueryString = ['data','slot'];


    public function mount($token)
    {
        $this->token = $token;
        $this->data = request()->query('data', $this->data);
        $this->slot = request()->query('slot', $this->slot);
        $this->motivo = Auth::guard('cliente')->user()->motivo;
        if($this->data != null and $this->slot != null or $this->motivo != ''){
            $this->showHorarios = true;
        }
    }

    public function cancelar(){
        $this->slot = null;
        $this->status = 0;
    }

    public function validaMotivo(){
        $this->validate([
            'motivo' => 'required'
        ]);
        $this->showHorarios = true;
        $this->data = null;
        $this->slot = null;
    }
    public function buscarData(){
        if($this->slot != null) {
            $this->cancelar();
        }
    }
    public function selecionaHorario($id){
        $this->slot = $id;
    }

    public function getHorarioProperty(){
        return Horario::find($this->slot);
    }

    public function confirmarSolicitacao(){
        Db::beginTransaction();
        if(TokenLink::validateTokenLink($this->token)) {
            $data = Carbon::parse($this->data);
            $horario = Horario::paraDia($data)->with('psicologo')->where('id', $this->slot)->first();
            if ($horario != null) {
                $data_agendada = Carbon::parse($horario->hora_inicio);
                $date = Carbon::create($data->year, $data->month, $data->day, $data_agendada->hour, $data_agendada->minute, 0);
                $solicitacao = Auth::guard('cliente')->user()->agendamentos()
                    ->create([
                        'horario_id' => $horario->id,
                        'data_agendada' => $date,
                        'status' => 1
                    ]);
                $notificacao = Notificacao::create([
                    'mensagem' => 'Nova Solicitação de Atendimento',
                    'meta_data' => ['solicitacao_id' => $solicitacao->id],
                ]);
                NotificacaoPsicologo::create([
                    'psicologo_id' => $horario->psicologo_id,
                    'notificacao_id' => $notificacao->id,
                    'notificado' => false
                ]);
                $this->confirmarSucesso();
            } else {
                $this->confirmarErro();
            }
        }else{
            $this->dispatchBrowserEvent('token-expired');
        }
        Db::commit();
    }
    public function confirmarSucesso(){
        $this->status = 1;
        TokenLink::invalidateTokenLink($this->token);
    }
    public function confirmarErro(){
        $this->status = 2;
    }
    public function render()
    {
        $horarios = [];
        if($this->status == 0){
            if($this->showHorarios == true) {
                if ($this->data != null and $this->slot == null) {
                    $data = Carbon::parse($this->data);
                    $horarios = Horario::paraDia($data)->with('psicologo')->get( );

                }
            }
            return view('livewire.cliente.views.agendar-horario.index',['horarios' => $horarios]);
        }
        if($this->status == 1){
            return view('livewire.cliente.views.agendar-horario.sucesso');
        }
        if($this->status == 2){
            return view('livewire.cliente.views.agendar-horario.erro');
        }

    }
}
