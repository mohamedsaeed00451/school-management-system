<?php

namespace App\Interfaces\Teachers;

interface TeacherDashboardInterface
{
    public function dashboard();
    public function getStudents();
    public function getSectionStudents($id);
    public function getSections();
    public function attendanceReport();
    public function attendanceSearch($request);
    public function attendance($request);
    public function attendanceDetailsStudent($id,$to,$from);
}
