<?php

namespace App\Notifications\Parents;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddStudentNotification extends Notification
{
    use Queueable;

    private $student_name;
    public function __construct($student_name)
    {
        $this->student_name = $student_name;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'Name' => $this->student_name
        ];
    }
}
