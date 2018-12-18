<?php

namespace App\Listeners;

use App\Events\MessageWasRecived;
use Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAutoresponder
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
            $m->to($message->email, $message->nombre);
        
            $m->subject('Tu mensaje fue recibido');
        });
    }
}
