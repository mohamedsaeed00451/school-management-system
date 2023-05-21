<?php

namespace App\Repositories;

use App\Interfaces\GradesInterface;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;

class GradesRepository implements GradesInterface
{

	public function index()
	{
        $Grades = Grade::all();
        return view('pages.Grades.Grades', compact('Grades'));
	}

	public function store($request)
	{
        // if (Grade::where('Name->ar',$request->Name_ar)->orwhere('Name->en' , $request->Name_en)->exists()) {
        //     toastr()->warning(trans('Grades_trans.Exists'));
        //     return redirect()->route('Grades.index');
        // }

        try {
            Grade::create([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Notes' => $request->Notes
            ]);

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Grades.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {
            $Grades = Grade::findOrfail($request->id);
            $Grades->update([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Notes' => $request->Notes
            ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Grades.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        $class_id = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');
        if ($class_id->count() == 0) {
            try {
                Grade::findOrfail($request->id)->delete();
                toastr()->success(trans('Message_trans.Delete'));
                return redirect()->route('Grades.index');
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            toastr()->error(trans('Grades_trans.Delete_Grade_Error'));
            return redirect()->route('Grades.index');
        }
	}
}
