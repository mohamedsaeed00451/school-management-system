<?php

namespace App\Notifications\Admins;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AddOnlineClassrooms extends Notification
{
    use Queueable;

    private $Topic;
    public function __construct($Topic)
    {
        $this->Topic = $Topic;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'Name' => $this->Topic
        ];
    }
}
