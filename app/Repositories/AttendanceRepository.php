<?php

namespace App\Repositories;

use App\Interfaces\AttendanceInterface;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use Exception;

class AttendanceRepository implements AttendanceInterface
{
    public function index()
    {
        $Grades = Grade::with(['sections'])->get();
        return view('pages.Attendance.Sections', compact('Grades'));
    }
    public function show($id)
    {
        $students = Student::with('attendance')->where('Section_id', $id)->get();
        return view('pages.Attendance.index', compact('students'));
    }
    public function edit($id)
    {

    }
    public function store($request)
    {
        try {
            if (!empty($request->attendances)) {
                foreach ($request->attendances as $student_id => $attendance) {

                    if ($attendance == 'presence') {
                        $attendance_status = true;
                    } else if ($attendance == 'absent') {
                        $attendance_status = false;
                    }

                    Attendance::create([
                        'Student_id' => $student_id,
                        'Grade_id' => $request->Grade_id,
                        'Classroom_id' => $request->Classroom_id,
                        'Section_id' => $request->Section_id,
                        'Teacher_id' => 1,
                        'Attendance_date' => date('Y-m-d'),
                        'Attendance_status' => $attendance_status
                    ]);

                }

                toastr()->success(trans('Message_trans.Success'));
                return redirect()->back();

            } else {
                toastr()->warning(trans('Message_trans.No_Data'));
                return redirect()->back();
            }

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {

    }
    public function destroy($request)
    {

    }
}