<?php

namespace App\Http\Traits;

use App\Models\MyParent;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;

trait NotificatonsTrait
{
    public function getUser($id)
    {
        if (auth('web')->check()){
            return User::find($id);
        }

        elseif (auth('student')->check()){
            return Student::find($id);
        }

        elseif (auth('parent')->check()){
            return MyParent::find($id);
        }

        elseif (auth('teacher')->check()){
            return Teacher::find($id);
        }
    }
}
