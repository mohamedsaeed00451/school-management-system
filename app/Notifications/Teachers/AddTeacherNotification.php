<?php

namespace App\Notifications\Teachers;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AddTeacherNotification extends Notification
{
    use Queueable;

    private $teacher_name;
    public function __construct($teacher_name)
    {
        $this->teacher_name = $teacher_name;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'Name' => $this->teacher_name
        ];
    }
}
