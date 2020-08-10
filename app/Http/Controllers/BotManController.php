<?php

namespace App\Http\Controllers;

use App\Conversations\Boasvindas;
use App\Conversations\ExampleConversation;
use BotMan\BotMan\BotMan;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return Factory|View
     */
    public function home()
    {
        if(!auth()->user())
            return redirect('/login');
        else
            return view('welcome');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {

        $bot->startConversation(new ExampleConversation());
    }

    public function test(BotMan $bot)
    {
        $bot->startConversation(new Boasvindas());
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
