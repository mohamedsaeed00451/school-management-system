<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OnlineClass;
use Illuminate\Http\Request;

class StudentOnlineClass extends Controller
{
    public function index()
    {
        $online_classes = OnlineClass::where('Grade_id', auth()->user()->Grade_id)
            ->where('Classroom_id',auth()->user()->Classroom_id)
            ->where('Section_id',auth()->user()->Section_id)
            ->get();
        return view('pages.Students.Dashboard.OnlineClasses.index', compact('online_classes'));
    }
}
