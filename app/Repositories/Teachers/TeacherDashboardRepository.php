<?php

namespace App\Repositories\Teachers;

use App\Interfaces\Teachers\TeacherDashboardInterface;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use TheSeer\Tokenizer\Exception;

class TeacherDashboardRepository implements TeacherDashboardInterface
{

    private function idSectionStudents()
    {
        $sections_ids = Teacher::findOrFail(Auth::user()->id)->sections()->pluck('section_id');
        $students_ids = Student::whereIn('Section_id', $sections_ids)->pluck('id');
        $data = [
            'students_ids' => $students_ids,
            'sections_ids' => $sections_ids
        ];
        return $data;
    }
    public function dashboard()
    {
        $data = $this->idSectionStudents();
        $students = $data['students_ids']->count();
        $sections = $data['sections_ids']->count();
        return view('pages.Teachers.Dashboard.dashboard', compact('students', 'sections'));
    }

    public function getStudents()
    {
        $data = $this->idSectionStudents();
        $sections_ids = Section::whereIn('id', $data['sections_ids'])->where('Status', 1)->pluck('id');
        $students = Student::whereIn('Section_id', $sections_ids)->get();
        return view('pages.Teachers.Dashboard.Students.index', compact('students'));
    }

    public function getSectionStudents($id)
    {
        $students = Student::where('Section_id', $id)->get();
        return view('pages.Teachers.Dashboard.Students.index', compact('students'));
    }

    public function getSections()
    {
        $data = $this->idSectionStudents();
        $sections = Section::whereIn('id', $data['sections_ids'])->get();
        return view('pages.Teachers.Dashboard.Sections.index', compact('sections'));
    }

    public function attendanceReport()
    {
        $data = $this->idSectionStudents();
        $sections_ids = Section::whereIn('id', $data['sections_ids'])->where('Status', 1)->pluck('id');
        $students = Student::whereIn('Section_id', $sections_ids)->get();
        return view('pages.Teachers.Dashboard.Students.attendance_report', compact('students'));
    }

    public function attendanceSearch($request)
    {
        $data = $this->idSectionStudents();
        $sections_ids = Section::whereIn('id', $data['sections_ids'])->where('Status', 1)->pluck('id');
        $students = Student::whereIn('Section_id', $sections_ids)->get();

        if ($request->student_id == 0) {
            $studentAttendances = $students;
        } else {
            $studentAttendances = Student::where('id', $request->student_id)->get();
        }

        $date = [
            'to' => $request->to,
            'from' => $request->from,
            'students' => $students,
            'studentAttendances' => $studentAttendances,
        ];

        return view('pages.Teachers.Dashboard.Students.attendance_report', $date);
    }

    public function attendance($request)
    {
        try {
            if (!empty($request->attendances)) {
                foreach ($request->attendances as $student_id => $attendance) {

                    if ($attendance == 'presence') {
                        $attendance_status = true;
                    } else if ($attendance == 'absent') {
                        $attendance_status = false;
                    }

                    Attendance::updateOrCreate(
                        [
                            'Student_id' => $student_id,
                            'Attendance_date' => date('Y-m-d'),
                        ],
                        [
                            'Student_id' => $student_id,
                            'Grade_id' => $request->Grade_id,
                            'Classroom_id' => $request->Classroom_id,
                            'Section_id' => $request->Section_id,
                            'Teacher_id' => Auth::user()->id,
                            'Attendance_date' => date('Y-m-d'),
                            'Attendance_status' => $attendance_status
                        ]
                    );

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

    public function attendanceDetailsStudent($id,$to,$from)
    {
        $student = Student::findOrFail($id);
        return view('pages.Teachers.Dashboard.Students.show', compact('student', 'from', 'to'));
    }
}
