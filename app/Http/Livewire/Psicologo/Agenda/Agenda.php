<?php

namespace App\Http\Livewire\Psicologo\Agenda;

use App\Facades\GoogleCalendar;
use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Evento;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Agenda extends Component
{
    public $atendimentoId;
    public $openModal;
    public $events;
    public $solicitacao = false;
    protected $listeners = [
        'open-details-modal' => 'openDetails',
        'open-solicitacoes-modal' => 'openSolicitacoesModal',
        'open-atendimentos-modal' => 'openAtendimentosModal',
    ];
    public function mount($events){
        $this->atendimentoId = null;
        $this->openModal = false;

        if(Auth::user()->googleAuth !=null and Auth::user()->googleAuth->expired){
            GoogleCalendar::refreshToken(Auth::user()->googleAuth);
        }
        $this->events = $events;
    }


    public function render()
    {
        return view('livewire.psicologo.agenda.agenda');
    }
    public function openDetails($eventId,$solicitacao){

        $this->atendimentoId = $eventId;
        $this->solicitacao = $solicitacao;
        $this->openModal = true;
    }
    public function openSolicitacoesModal($eventId){
        $this->openDetails($eventId,false);
    }
    public function openAtendimentosModal($eventId){
        $this->openDetails($eventId,true);
    }
    public function closeDetails(){
        $this->atendimentoId = null;
        $this->openModal = false;
    }
    public function getAtendimentoProperty(){
        if($this->solicitacao == true) {
            return Evento::with(['horario','cliente'])->find($this->atendimentoId);
        }
        return Agendamento::with(['horario','cliente'])->find($this->atendimentoId);
    }

    public function confirmarSolicitacao(){
        Db::beginTransaction();
        $solicitacao = Agendamento::with(['horario','cliente'])->find($this->atendimentoId);
        $solicitacao->status = Agendamento::AGENDADO;
        $solicitacao->save();
        $horaFinal = Carbon::parse($solicitacao->horario->hora_final);
        $evento = Evento::create([
            'cliente_id' => $solicitacao->cliente_id,
            'horario_id' => $solicitacao->horario_id,
            'recorrencia' => [],
            'inicio' => $solicitacao->data_agendada,
            'final' => Carbon::create(
                $solicitacao->data_agendada->year,
                $solicitacao->data_agendada->month,
                $solicitacao->data_agendada->day,
                $horaFinal->hour,
                $horaFinal->minute,
                0
            )->timezone('America/Sao_Paulo'),
            'google_calendar_id' => ''
        ]);
        try {
            $googleEvent = GoogleCalendar::addEvent($evento);
            $evento->google_calendar_id = $googleEvent->id;
        }catch (Exception $e){
            session()->flash('warning','Sem integração com o google calendário');
        }
        $evento->save();
        $this->closeDetails();
        session()->flash('success','Soliciatação aceita, novo Atendimento para o dia '. $solicitacao->data_agendada->format('d/m/Y - H:i'));
        $this->redirect("#");
        Db::commit();
    }

    public function getGoogleUrlProperty(){
        return GoogleCalendar::getAuthUrl();
    }


}
