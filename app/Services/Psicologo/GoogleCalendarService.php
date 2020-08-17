<?php

namespace App\Services\Psicologo;

use App\Models\Atendimento\Atendimento;
use App\Models\Psicologo\GoogleAuth;
use App\Models\Psicologo\Psicologo;
use Carbon\Carbon;
use Exception;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Log;

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
                    ->getDateTime());
                if($event->colorId == 2) {

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

    public function addEvent(Atendimento $event): Google_Service_Calendar_Event
    {
        $psicologo = $event->psicologo()->select(['id','email'])->first();
        $cliente   = $event->cliente()->select(['id','email'])->first();
        $auth = GoogleAuth::where('psicologo_id',$psicologo->id)->first();
        $calendarId = $this->getCalendarId($event);

        $startDateTime = $event->inicio_atendimento;
        $endDateTime =  $event->final_atendimento;


        $newEvent = new Google_Service_Calendar_Event([
            'summary'     => 'Atendimento:'.$event->inicio_atendimento->format('H:m').' - '.$event->final_atendimento->format('H:m') ,
            'description' => 'Cliente: '.$cliente->nome,
            'start'       => [
                'dateTime' => $startDateTime->toIsoString(),
            ],
            'end'         => [
                'dateTime' => $endDateTime->toIsoString(),
            ],
            'attendees'   => [
                ['email' => $psicologo->email],
                ['email' => $cliente->email]
            ]
        ]);
        $newEvent->setColorId(2);
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
    public function getCalendarId($event){
        $psicologo = $event->psicologo()->select('id')->first();
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

    public function user(User $user): self
    {
        if (!$user->googleAuth) {
            return $this;
        }

        $this->setAccessToken($user->googleAuth->access_token);

        return $this;
    }

    public function client(? User $user)
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

    public function getEvent(Atendimento $event)
    {
        $calendarId = $this->getCalendarId($event);
        return $this->calendar()->events->get($calendarId, $event->google_calendar_id);
    }

    public function syncEvent(Atendimento $event)
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
