<?php

namespace App\Providers\BotMan;

use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Whatsappgo\WhatsappgoDriver;
use BotMan\Studio\Providers\DriverServiceProvider as ServiceProvider;

class DriverServiceProvider extends ServiceProvider
{
    /**
     * The drivers that should be loaded to
     * use with BotMan
     *
     * @var array
     */
    protected $drivers = [
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();
        DriverManager::loadDriver(WhatsappgoDriver::class);

    }
}
