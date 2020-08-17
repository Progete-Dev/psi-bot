<?php

use App\Http\Controllers\BotManController;

Route::post( '/botman', [BotManController::class,'handle']);