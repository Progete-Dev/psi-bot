<?php
use App\Http\Controllers\BotManController;
use App\Http\Middleware\LoginMiddleware;
use BotMan\Drivers\Web\WebDriver;
use BotMan\Drivers\Whatsappgo\WhatsappgoDriver;

$botman = resolve('botman');

// $botman->middleware->received(new LoginMiddleware());
// // $botman->group(['middleware' => new LoginMiddleware()], function($bot) {
    
    
// // });
$botman->group(['driver' =>[ WhatsappgoDriver::class,WebDriver::class]],function($bot){
    $bot->hears("", BotManController::class."@startConversation");
});
//$botman->hears("test", BotManController::class."@test");



