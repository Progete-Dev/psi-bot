<?php

namespace App\Http\Controllers;

use App\Services\Psicologo\GoogleCalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function store(Request $request, GoogleCalendarService $service)
    {
        if ($request->error) {
            return redirect('/settings#/profile');
        }

        $token = $service->client->fetchAccessTokenWithAuthCode($request->code);
        $calendars = $service->fetchCalendars();

        $check_calendars = collect($calendars->items)->filter(function ($calendar) {
            return $calendar->primary;
        })->map->id->values()->toArray();

        Auth::user()->googleAuth()
            ->firstOrNew([
                'psicologo_id' => Auth::user()->id,
            ])
            ->fillCredentials($token)
            ->fill(compact('check_calendars'))
            ->save();

        return redirect()->route('psicologo.agenda');
    }
}
