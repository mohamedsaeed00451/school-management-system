<?php

namespace App\Interfaces\Parents;

interface ParentStudentInterface
{
    public function getStudents();
    public function getAttendances();
    public function getStudentParentAttendances($request);
    public function attendanceDetailsStudent($id,$to,$from);
    public function getQuizzesDegrees();
    public function getQuizzesStudentDegrees($id);
    public function getStudentsFee();
    public function getStudentFeeDetails($id);
}
