<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Requests\GetAttendance;
use App\Interfaces\Teachers\TeacherDashboardInterface;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use TheSeer\Tokenizer\Exception;

class TeacherDashboardController extends Controller
{

    private $TeacherDashboard;
    public function __construct(TeacherDashboardInterface $TeacherDashboard)
    {
        $this->TeacherDashboard = $TeacherDashboard;
    }

    public function dashboard()
    {
       return $this->TeacherDashboard->dashboard();
    }

    public function getStudents()
    {
        return $this->TeacherDashboard->getStudents();
    }

    public function getSectionStudents($id)
    {
        return $this->TeacherDashboard->getSectionStudents($id);
    }

    public function getSections()
    {
        return $this->TeacherDashboard->getSections();
    }

    public function attendanceReport()
    {
        return $this->TeacherDashboard->attendanceReport();
    }

    public function attendanceSearch(GetAttendance $request)
    {
        return $this->TeacherDashboard->attendanceSearch($request);
    }

    public function attendance(Request $request)
    {
        return $this->TeacherDashboard->attendance($request);
    }

    public function attendanceDetailsStudent($id,$to,$from)
    {
        return $this->TeacherDashboard->attendanceDetailsStudent($id,$to,$from);
    }


}
