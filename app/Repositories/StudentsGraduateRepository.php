<?php

namespace App\Repositories;


use App\Interfaces\StudentsGraduateInterface;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use TheSeer\Tokenizer\Exception;

class StudentsGraduateRepository implements StudentsGraduateInterface
{

    public function index()
    {
        $Students = Student::onlyTrashed()->get();
        return view('pages.Students.Graduated.index', compact('Students'));
    }
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Students.Graduated.create', compact('Grades'));
    }

    public function softDelete($request)
    {
        try {
            $Students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id', $request->Classroom_id)
                ->where('Section_id', $request->Section_id)
                ->get();

            if ($Students->count() < 1) {
                toastr()->error(trans('Message_trans.No_Data'));
                return redirect()->back();
            }

            foreach ($Students as $Student) {
                $ids = explode(',', $Student->id);
                Student::whereIn('id', $ids)->Delete();
                Promotion::whereIn('Student_id', $ids)->Delete();
            }

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function returnStudentBack($request)
    {
        try {
            Student::onlyTrashed()->where('id', $request->id)->restore();
            Promotion::onlyTrashed()->where('Student_id', $request->id)->restore();
            toastr()->success(trans('Message_trans.Update'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Student::onlyTrashed()->where('id', $request->id)->forceDelete();
            Promotion::onlyTrashed()->where('Student_id', $request->id)->forceDelete();
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}