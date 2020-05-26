<?php

namespace Tests\BotMan;

use Tests\TestCase;

class FormularioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->bot
            ->receives('Te')
            ->assertReply('Hello!');
    }
}
