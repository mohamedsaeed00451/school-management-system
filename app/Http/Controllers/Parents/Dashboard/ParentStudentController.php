<?php

namespace App\Http\Controllers\Parents\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Parents\ParentStudentInterface;
use Illuminate\Http\Request;

class ParentStudentController extends Controller
{
    private $ParentStudent;

    public function __construct(ParentStudentInterface $ParentStudent)
    {
        $this->ParentStudent = $ParentStudent;
    }
    public function getStudents()
    {
        return $this->ParentStudent->getStudents();
    }

    public function getAttendances()
    {
        return $this->ParentStudent->getAttendances();
    }

    public function getStudentParentAttendances(Request $request)
    {
        return $this->ParentStudent->getStudentParentAttendances($request);
    }

    public function attendanceDetailsStudent($id,$to,$from)
    {
        return $this->ParentStudent->attendanceDetailsStudent($id,$to,$from);
    }

    public function getQuizzesDegrees()
    {
        return $this->ParentStudent->getQuizzesDegrees();
    }

    public function getQuizzesStudentDegrees($id)
    {
        return $this->ParentStudent->getQuizzesStudentDegrees($id);
    }

    public function getStudentsFee()
    {
        return $this->ParentStudent->getStudentsFee();
    }

    public function getStudentFeeDetails($id)
    {
        return $this->ParentStudent->getStudentFeeDetails($id);
    }

}
