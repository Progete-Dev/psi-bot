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
    public $solicitacao = false;
    public $dia;
    public $mes;
    public $ano;
    protected $listeners = [
        'open-details-modal' => 'openDetails',
        'open-solicitacoes-modal' => 'openSolicitacoesModal',
        'open-atendimentos-modal' => 'openAtendimentosModal',
    ];
    public function mount(){

        $this->atendimentoId = null;
        $this->openModal = false;

        if(Auth::user()->googleAuth !=null and Auth::user()->googleAuth->expired){
            GoogleCalendar::refreshToken(Auth::user()->googleAuth);
        }
    }


    public function render()
    {
        $date = now()->startOfMonth();
        $atendimentos = Evento::paraPsicologo(Auth::user()->id)
            ->withEventosSince($date)
            ->with('cliente')
            ->get();
        $solicitacoes = Agendamento::paraPsicologo(Auth::user()->id)
            ->withAgendamentosSince($date)
            ->where('status','<',Agendamento::AGENDADO)
            ->with('cliente')
            ->get();
        return view('livewire.psicologo.agenda.agenda',[
            'solicitacoes' => $solicitacoes,
            'atendimentos' => $atendimentos,
        ]);
    }
    public function openDetails($eventId,$solicitacao,$dia,$mes,$ano){
        $this->atendimentoId = $eventId;
        $this->solicitacao = $solicitacao;
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
        $this->openModal = true;

    }
    public function openSolicitacoesModal($eventId,$dia,$mes,$ano){
        $this->openDetails($eventId,false,$dia,$mes,$ano);
    }
    public function openAtendimentosModal($eventId,$dia,$mes,$ano){
        $this->openDetails($eventId,true,$dia,$mes,$ano);
    }
    public function closeDetails(){
        $this->atendimentoId = null;
        $this->openModal = false;
    }
    public function getAtendimentoProperty(){
        if($this->solicitacao == true) {
            $evento =Evento::with(['horario','cliente'])->find($this->atendimentoId);
            return $evento;
        }
        $evento = Agendamento::with(['horario','cliente'])->find($this->atendimentoId);
        return $evento;
    }

    public function confirmarSolicitacao(){
        Db::beginTransaction();
        $solicitacao = Agendamento::with(['horario','cliente'])->find($this->atendimentoId);
        if($solicitacao == null){
            session()->flash('error', 'Solicitação nao existe mais, o cliente pode ter cancelado');
            $this->redirect("#");

        }
        $solicitacao->status = Agendamento::AGENDADO;
        $solicitacao->save();
        $horaFinal = Carbon::parse($solicitacao->horario->hora_final);
        $dataAgendada = Carbon::createFromTimeString($solicitacao->data_agendada);
        $evento = Evento::create([
            'cliente_id' => $solicitacao->cliente_id,
            'horario_id' => $solicitacao->horario_id,
            'recorrencia' => [],
            'inicio' => $dataAgendada,
            'final' => Carbon::create(
                $dataAgendada->year,
                $dataAgendada->month,
                $dataAgendada->day,
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
        session()->flash('success','Soliciatação aceita, novo Atendimento para o dia '. $dataAgendada->format('d/m/Y - H:i'));
        $this->redirect("#");
        Db::commit();
    }

    public function getGoogleUrlProperty(){
        return GoogleCalendar::getAuthUrl();
    }


}
