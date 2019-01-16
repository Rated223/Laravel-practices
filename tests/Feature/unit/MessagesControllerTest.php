<?php

namespace Tests\Feature\unit;

use App\Http\Controllers\MessagesController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessagesControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
    	$messageRepo = Mockery::mock('App\Repositories\Messages');
        $controller = new MessagesController($messagesRepo);
    }
}
