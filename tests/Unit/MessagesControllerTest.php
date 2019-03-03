<?php

namespace Tests\Feature\Unit;

use Mockery;
use Tests\TestCase;
use App\Http\Controllers\MessagesController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessagesControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index()
    {
    	/* $messagesRepo = Mockery::mock('App\Repositories\MessagesInterface');
    	$view = Mockery::mock('Illuminate\View\Factory');
        $controller = new MessagesController($messagesRepo, $view);
        $messageRepo->shouldReceive('getPaginated')->once();
        $controller->index(); */
    }

    public function tearDown()
    {
    	Mockery::close();
    }
}
