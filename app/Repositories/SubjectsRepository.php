<?php

namespace App\Repositories;

use App\Interfaces\SubjectsInterface;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class SubjectsRepository implements SubjectsInterface
{
    public function index()
    {
        $subjects = Subject::all();
        return view('pages.Subjects.index', compact('subjects'));
    }
    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.create', compact('grades', 'teachers'));
    }
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.edit', compact('subject', 'grades', 'teachers'));
    }
    public function store($request)
    {
        try {

            Subject::create([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Teacher_id' => $request->Teacher_id,
            ]);

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('subjects.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request)
    {
        try {

            Subject::findOrFail($request->id)
                ->update([
                    'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Teacher_id' => $request->Teacher_id,
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('subjects.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('subjects.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}