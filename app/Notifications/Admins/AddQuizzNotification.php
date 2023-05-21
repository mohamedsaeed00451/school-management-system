<?php

namespace App\Notifications\Admins;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddQuizzNotification extends Notification
{
    use Queueable;

    private $quizze;
    public function __construct($quizze)
    {
        $this->quizze = $quizze;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'Name' => $this->quizze->Name,
            'quizze_id' => $this->quizze->id,
        ];
    }
}
