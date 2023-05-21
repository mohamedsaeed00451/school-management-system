<?php

namespace App\Repositories;

use App\Interfaces\SectionsInterface;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Exception;

class SectionsRepository implements SectionsInterface
{

	public function index()
	{
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Sections.Sections', compact('Grades', 'list_Grades', 'teachers'));
	}

	public function store($request)
	{
        try {
            $Sections = Section::create([
                'Name_Section' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id,
                'Class_id' => $request->Classroom_id,
                'Status' => 1,
            ]);

            $Sections->teachers()->attach($request->teacher_id);

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Sections.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {
            $Sections = Section::findOrfail($request->id);
            $status = 2;
            if (isset($request->Status)) {
                $status = 1;
            }
            $Sections->update([
                'Name_Section' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id,
                'Class_id' => $request->Classroom_id,
                'Status' => $status,
            ]);

            $Sections->teachers()->sync($request->teacher_id);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Sections.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {
            Section::findOrfail($request->id)->delete();
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('Sections.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
