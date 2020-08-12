<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicantNotification extends Notification
{
    use Queueable;

    public $thread;

    public function __construct($thread)
    {
        $this->thread = $thread;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'thread' => $this->thread,
            'message'=>'New Applicant Added'
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
