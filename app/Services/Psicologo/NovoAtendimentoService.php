<?php


namespace App\Services\Psicologo;



use App\Facades\GoogleCalendar;
use App\Repositories\EventoRepository;
use App\Services\BaseService;
use Google_Service_Exception;

class NovoAtendimentoService extends BaseService
{
    public function __construct(EventoRepository $repo)
    {
        $this->repo = $repo;
    }


    public function create($data){
        $evento = parent::create($data);
        try {
            $googleEvent = GoogleCalendar::addEvent($evento);
            $evento->google_calendar_id = $googleEvent->id;
            $evento->save();
        }catch (Google_Service_Exception $e){
            session()->flash('warning','Sem integração com o google calendário');
        }
        return $evento;
    }
}