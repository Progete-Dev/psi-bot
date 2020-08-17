<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');
$botman->hears("", BotManController::class.'@startConversation');

