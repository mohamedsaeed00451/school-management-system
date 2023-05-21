<?php

namespace App\Http\Controllers\Parents\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ParentDashoardController extends Controller
{
    public function index()
    {
        $students = Student::where('Parent_id',auth()->user()->id)->get();
        return view('pages.Parents.Dashboard.dashboard',compact('students'));
    }
}
