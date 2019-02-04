<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ChatSent extends Notification implements ShouldQueue
{
    private $chat;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chat)
    {
        //
        $this->chat = $chat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($notifiable->name . ",")
                    ->subject('Prueba Laravel: Mensaje recibido')
                    ->line('Has recibido un mensaje')
                    ->action('Ir al chat', url('chat.create', $this->chat->sender_id))
                    ->line('Gracias por usar nuestra aplicacion!');

        //return (new MailMessage)->view('', [data]);
        //Tambien se puede usar un mailable
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->chat->toArray();
    }
}
