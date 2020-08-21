<?php

namespace App\Facades;


use App\Services\Cliente\TokenLinkService;
use Illuminate\Support\Facades\Facade;

class TokenLink extends Facade
{

    protected static function getFacadeAccessor()
    {
        return TokenLinkService::class;
    }
}
