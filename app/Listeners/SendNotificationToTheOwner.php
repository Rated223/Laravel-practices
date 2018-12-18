<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasRecived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner
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
     * @param  MessageWasRecived  $event
     * @return void
     */
    public function handle(MessageWasRecived $event)
    {
        $message = $event->message;
        Mail::send('emails.contact', ['msg' => $message], function ($m) use ($message) {
            $m->from($message->email, $message->nombre);
            $m->to('Rated223@prueba.com', 'Daniel');
        
            $m->subject('Tu mensaje fue recibido');
        });
    }
}
