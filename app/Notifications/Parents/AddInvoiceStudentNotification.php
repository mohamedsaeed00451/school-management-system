<?php

namespace App\Notifications\parents;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AddInvoiceStudentNotification extends Notification
{
    use Queueable;

    private $student;
    public function __construct($student)
    {
        $this->student = $student;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'Name' => $this->student->getTranslation('Name','ar'),
            'student_id' => $this->student->id
        ];
    }
}
