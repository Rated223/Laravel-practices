<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SendMessageTest extends TestCase
{
	use RefreshDatabase, DatabaseMigrations;

    /** @test */

    public function an_user_can_send_a_message()
    {
        $user = factory(User::class)->create();
		$this->actingAs($user);

		$this->post(route('mensajes.store'), ['mensaje' => 'Mensaje de prueba']);

		$this->assertDatabaseHas('messages', [
			'mensaje' => 'Mensaje de prueba'
		]);

    }
}
