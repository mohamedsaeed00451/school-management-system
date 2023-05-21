<?php

namespace App\Repositories\Parents;

use App\Interfaces\Parents\ParentStudentInterface;
use App\Models\Degree;
use App\Models\FeeInvoice;
use App\Models\Student;

class ParentStudentRepository implements ParentStudentInterface
{

    public function getParentStudents()
    {
        return Student::where('Parent_id',auth()->user()->id)->get();
    }

    public function checkParent($id)
    {
        $student = Student::findOrFail($id);
        if ($student->Parent_id != auth()->user()->id) {
            return false;
        }
        return $student;
    }

	public function getStudents()
	{
        $students = $this->getParentStudents();
        return view('pages.Parents.Dashboard.Students.index',compact('students'));
	}

	public function getAttendances()
	{
        $students = $this->getParentStudents();
        return view('pages.Parents.Dashboard.Attendances.attendance_report', compact('students'));
	}

	public function getStudentParentAttendances($request)
	{
        $students = $this->getParentStudents();

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

        return view('pages.Parents.Dashboard.Attendances.attendance_report', $date);
	}

	public function attendanceDetailsStudent($id, $to, $from)
	{
        $student = $this->checkParent($id);
        if (!$student) {
            toastr()->error(trans('Message_trans.Error'));
            return redirect()->back();
        }

        if ($student->attendance()->count() < 1) {
            toastr()->warning(trans('Message_trans.No_Data'));
            return redirect()->back();
        }

        return view('pages.Parents.Dashboard.Attendances.show', compact('student', 'from', 'to'));
	}

	public function getQuizzesDegrees()
	{
        $student_ids = Student::where('Parent_id',auth()->user()->id)->pluck('id');
        $degrees = Degree::whereIn('Student_id',$student_ids)->get();
        return view('pages.Parents.Dashboard.Quizzes.index',compact('degrees'));
	}

	public function getQuizzesStudentDegrees($id)
	{
        $student = $this->checkParent($id);
        if (!$student) {
            toastr()->error(trans('Message_trans.Error'));
            return redirect()->back();
        }

        $degrees = Degree::where('Student_id',$id)->get();
        if ($degrees->count() < 1) {
            toastr()->warning(trans('Message_trans.No_Data'));
            return redirect()->back();
        }
        return view('pages.Parents.Dashboard.Quizzes.index',compact('degrees','student'));
	}

	public function getStudentsFee()
	{
        $students = $this->getParentStudents();
        return view('pages.Parents.Dashboard.Fees.index',compact('students'));
	}

	public function getStudentFeeDetails($id)
	{
        $student = $this->checkParent($id);
        if (!$student) {
            toastr()->error(trans('Message_trans.Error'));
            return redirect()->back();
        }

        $fees = FeeInvoice::where('Student_id',$id)->get();

        if ($fees->count() < 1) {
            toastr()->warning(trans('Message_trans.No_Data'));
            return redirect()->back();
        }

        return view('pages.Parents.Dashboard.Fees.show',compact('fees','student'));
	}
}
