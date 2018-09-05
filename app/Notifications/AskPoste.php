<?php

namespace projetPhp\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class askPoste extends Notification
{
    use Queueable;
    protected $user;
    protected $poste;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($poste,$user)
    {
        $this->poste=$poste;
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail'];
        return ['database'];

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
//        dd($notifiable);
        return [
            'member'=>$this->poste,
            'user'=>$this->user,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
