<?php

namespace App\Http\Controllers;


use App\Http\Traits\NotificatonsTrait;
use Illuminate\Support\Facades\DB;

class Notification extends Controller
{
    use NotificatonsTrait;
    public function readNotification($id,$route)
    {
        DB::table('notifications')->where('id',$id)->update([
            'read_at' => now(),
        ]);

        if ($route != 'back') {
            return redirect()->route($route);
        }

        return redirect()->back();
    }

    public function readNotifications($id)
    {
        $user = $this->getUser($id);
        foreach($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
