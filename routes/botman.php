<?php
use App\Http\Controllers\BotManController;
use App\Http\Middleware\LoginMiddleware;



$botman = resolve('botman');
// $botman->middleware->received(new LoginMiddleware());
// // $botman->group(['middleware' => new LoginMiddleware()], function($bot) {
    
    
// // });
$botman->hears("", BotManController::class."@startConversation");
//$botman->hears("test", BotManController::class."@test");


// $botman->fallback(function($bot){
//     $bot->reply('Desculpe, não entendi. ');
// });

