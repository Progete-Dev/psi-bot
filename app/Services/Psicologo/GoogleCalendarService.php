<?php

namespace App\Services\Psicologo;

use App\Models\Atendimento\Atendimento;
use App\Models\Atendimento\Evento;
use App\Models\Cliente\Cliente;
use App\Models\Psicologo\GoogleAuth;
use App\Models\Psicologo\Psicologo;
use Carbon\Carbon;
use Exception;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Log;
use RRule\RRule;

class GoogleCalendarService
{
    public $client;
    public $service;

    public function __construct()
    {
        $this->client = new Google_Client(config('integrations.google'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');

        $this->client->setScopes([
            Google_Service_Calendar::CALENDAR,
            Google_Service_Calendar::CALENDAR_EVENTS,
            Google_Service_Calendar::CALENDAR_EVENTS_READONLY,
            Google_Service_Calendar::CALENDAR_SETTINGS_READONLY
        ]);
        $this->client->setRedirectUri(config('integrations.google.redirect_uri'));
        $this->client->setClientId(config('integrations.google.client_id'));
        $this->client->setClientSecret(config('integrations.google.client_secret'));
        $this->service = new Google_Service_Calendar($this->client);
    }

    public function refreshToken(GoogleAuth $googleAuth)
    {
        return $this->client->fetchAccessTokenWithRefreshToken($googleAuth->refresh_token);
    }

    public function getEvents(Psicologo $user, Carbon $from, Carbon $to)
    {
        Log::info('Calendar API CALL'. now()->format('Y-m-d - H:m ' ));
        $result = collect([]);
        if (!$user->googleAuth) {
            return $result;
        }

        if ($user->googleAuth->expired) {
            throw new Exception("Token is expired");
        }

        $timezone = $from->timezone;
        $this->client->setAccessToken($user->googleAuth->access_token);

        $service = new Google_Service_Calendar($this->client);
        foreach ($user->googleAuth->check_calendars as $calendarId) {
            $from = Carbon::createFromFormat('Y-m-d', $from->format('Y-m-d'), $timezone);
            $to = Carbon::createFromFormat('Y-m-d', $to->format('Y-m-d'), $timezone);

            $params = [
                'timeMin'      => $from->startOfDay()->toRfc3339String(),
                'timeMax'      => $to->endOfDay()->toRfc3339String(),
            ];

            $events = $service->events->listEvents($calendarId, $params);
            /** @var Google_Service_Calendar_Event $event */
            foreach ($events->getItems() as $event) {
                $start = Carbon::createFromFormat(Carbon::RFC3339, $event
                    ->getStart()
                    ->getDateTime());
                $end = Carbon::createFromFormat(Carbon::RFC3339, $event
                    ->getEnd()
                    ->getDateTime(),'America/Sao_Paulo');


                    $result->push([
                        'id' => $event->id,
                        'start' => $start,
                        'end' => $end,
                        'label' => $start->format('h:ia') . ' - ' . $end->format('h:ia') . " {$event->summary}",
                        'attendees' => $event->getAttendees(),
                        'info' => $this->getEntryPoints($event->getConferenceData()),
                        'recurrence' => isset($event->recurrence[0]) ? $this->parseRecurrenceRule($event->recurrence[0]) : '',
                        'status' => $event->status,
                        'descricao' => $event->description,
                    ]);

            }
        }

        return $result;
    }
    public function getEntryPoints($conference){
        if($conference != null) {
            return $conference->getEntryPoints();
        }
        return $conference;
    }
    public function parseRecurrenceRule($rule){

        $rules = explode(';', $rule);
        $rules[0] = str_replace("RULE:",'',$rules[0]);
        $rules = collect($rules)->reduce(function ($atual,$rule){
            $rule = explode('=',$rule);
            if($rule[0] == 'RFREQ'){
                $rule[0] = 'FREQ';
            }
            $atual[$rule[0]] = $rule[1];
            return $atual;
        },[]);

        return $rules;
    }
    public function fetchCalendars()
    {
        $calendars = $this->calendar()->calendarList->listCalendarList();

        return (object)[
            'items'         => $calendars->items,
            'kind'          => $calendars->kind,
            'nextPageToken' => $calendars->nextPageToken,
            'nextSyncToken' => $calendars->nextSyncToken,
        ];
    }

    public function addEvent(Evento $event): Google_Service_Calendar_Event
    {
        $horario = $event->horario;
        $psicologo = $horario->psicologo;
        $cliente   = $event->cliente;
        $auth = GoogleAuth::where('psicologo_id',$psicologo->id)->first();
        $calendarId = $this->getCalendarId($psicologo->id);

        $startDateTime = $event->inicio;
        $endDateTime =  $event->final;


        $newEvent = new Google_Service_Calendar_Event([
            'summary'     => 'Atendimento:'.$event->inicio->format('H:m'),
            'description' => 'Cliente: '.$cliente->nome,
            'start'       => [
                'dateTime' => $startDateTime->toIsoString(),
                'timeZone' => 'America/Sao_Paulo'
            ],
            'end'         => [
                'dateTime' => $endDateTime->toIsoString(),
                'timeZone' => 'America/Sao_Paulo'
            ],
            'attendees'   => [
                ['email' => $cliente->email]
            ]
        ]);
        if(count($event->recorrencia) > 0) {
            $rrule = 'RRULE:';
                $rr = new RRule($event->recorrencia);
                $rr = $rr->getRule();
            $rules = array_keys(RRule::FREQUENCIES);

            foreach($rr as $rule => $value){
                if($value != null) {
                    if($rule == 'FREQ'){
                        $value = $rules[$value+1];
                    }
                    $rrule .= $rule . '=' . $value.';';
                }
            }
            $newEvent->setRecurrence([$rrule]);
        }
        $newEvent->setGuestsCanInviteOthers(false);
        $this->client->setAccessToken($auth->access_token);
        $return = $this->calendar()->events->insert($calendarId, $newEvent);
        Log::info($return->id);
        return  $return;
    }

    public function delete(Atendimento $event)
    {
        $calendarId = $this->getCalendarId($event);

        return $this->calendar()->events->delete($calendarId, $event->google_calendar_id);
    }
    public function getCalendarId($psicologo){
        $auth = GoogleAuth::where('psicologo_id',$psicologo)->first();
        $calendarId = null;
        if($auth !== null) {
           return $auth->check_calendars[0];
        }else{
            throw new  Exception("No calendar integration");
        }
    }

    public function setAccessToken($token): self
    {
        $this->client->setAccessToken($token);

        return $this;
    }

    public function user(Psicologo $user): self
    {
        if (!$user->googleAuth) {
            return $this;
        }

        $this->setAccessToken($user->googleAuth->access_token);

        return $this;
    }

    public function client(? Cliente $user)
    {
        if ($user) {
            $this->user($user);
        }

        return $this->client;
    }

    public function calendar(): Google_Service_Calendar
    {
        return $this->service;
    }

    public function getEvent(Evento $event)
    {
        $horario = $event->horario;
        $psicologo = $horario->psicologo;
        $calendarId = $this->getCalendarId($psicologo->id);
        return $this->calendar()->events->get($calendarId, $event->google_calendar_id);
    }

    public function syncEvent(Evento $event)
    {
        $googleEvent = $this->getEvent($event);
        if ($googleEvent->status === 'cancelled') {
            $event->update([
                'status' => $googleEvent->updated,
                'synced_at' => now()
            ]);
            return 'canceled';
        }
        return $event->wasChanged() ? 'synced' : 'pristine';
    }
    public function getAuthUrl(){
        return $this->client->createAuthUrl();
    }
}
