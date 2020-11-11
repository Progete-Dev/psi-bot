<?php

namespace Tests\Feature;

use App\Models\Psicologo\Psicologo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void{
        parent::setUp();
        $this->actingAs(factory(Psicologo::class)->create([
        ]));
    }


}
