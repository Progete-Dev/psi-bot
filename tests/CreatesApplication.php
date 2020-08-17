<?php

namespace Tests;

use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Drivers\Tests\FakeDriver;
use BotMan\BotMan\Drivers\Tests\ProxyDriver;
use BotMan\Studio\Testing\BotManTester;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        DriverManager::loadDriver(ProxyDriver::class);
        $fakeDriver = new FakeDriver();
        ProxyDriver::setInstance($fakeDriver);

        $app->make(Kernel::class)->bootstrap();

        $this->botman = $app->make('botman');
        $this->bot = new BotManTester($this->botman, $fakeDriver);

        $this->clearCache(); // NEW LINE -- Testing doesn't work properly with cached stuff.
        return $app;
    }

/**
 * Clears Laravel Cache.
 */
protected function clearCache()
{
    $commands = ['clear-compiled', 'cache:clear', 'view:clear', 'config:clear', 'route:clear'];
    foreach ($commands as $command) {
        Artisan::call($command);
    }
}
}
