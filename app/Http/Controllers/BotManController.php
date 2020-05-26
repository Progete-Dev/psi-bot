<?php

namespace App\Http\Controllers;

use App\Conversations\Boasvindas;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
