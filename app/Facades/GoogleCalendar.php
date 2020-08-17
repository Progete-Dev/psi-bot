<?php

namespace App\Facades;

use App\Models\Psicologo\GoogleAuth;
use App\Models\Psicologo\Psicologo;
use App\Services\Psicologo\GoogleCalendarService;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array refreshToken(GoogleAuth $googleAuth)
 * @method static Collection getEvents(Psicologo $user, Carbon $from, Carbon $to)
 */
class GoogleCalendar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GoogleCalendarService::class;
    }
}
