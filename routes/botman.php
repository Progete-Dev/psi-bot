<?php
use App\Http\Controllers\BotManController;
use App\Http\Middleware\LoginMiddleware;



$botman = resolve('botman');
// $botman->middleware->received(new LoginMiddleware());
// // $botman->group(['middleware' => new LoginMiddleware()], function($bot) {
    
    
// // });
$botman->hears('(Oi|Ola|Bom dia|Boa tarde|Boa noite| hello )', BotManController::class."@startConversation");


// $botman->fallback(function($bot){
//     $bot->reply('Desculpe, não entendi. ');
// });

