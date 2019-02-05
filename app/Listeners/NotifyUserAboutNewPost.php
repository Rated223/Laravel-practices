<?php

namespace App\Listeners;

use App\User;
use App\Events\PostCreated;
use App\Notifications\PostPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUserAboutNewPost implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all(); //se puede aplicar un filtro para seleccionar solo ciertos usarios
        Notification::send($users, new PostPublished($event->post));
    }
}
