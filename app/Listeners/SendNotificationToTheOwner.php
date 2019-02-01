<?php

namespace App\Listeners;

use App\Events\MessageWasRecived;
use App\Mail\MensajeRecibido;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendNotificationToTheOwner implements ShouldQueue
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

        Mail::to('Rated223@prueba.com', 'Daniel')->send(new MensajeRecibido($message));

        /*
        Mail::send('emails.contact', ['data' => $message], function ($m) use ($message) {
            $m->from($message->email, $message->nombre);
            $m->to('Rated223@prueba.com', 'Daniel');
        
            $m->subject('Tu mensaje fue recibido');
        });
        */
    }
}
