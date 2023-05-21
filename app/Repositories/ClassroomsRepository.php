<?php

namespace App\Repositories;

use App\Interfaces\ClassroomsInterface;
use App\Models\Classroom;
use App\Models\Grade;
use TheSeer\Tokenizer\Exception;

class ClassroomsRepository implements ClassroomsInterface
{

	public function index()
	{
        $Classrooms = Classroom::all();
        $Grades = Grade::all();
        return view('pages.Classrooms.Classrooms', compact('Classrooms', 'Grades'));
	}

	public function store($request)
	{
        try {
            $classes = $request->List_Classes;
            foreach ($classes as $class) {
                Classroom::create([
                    'Name_Class' => ['en' => $class['Name_en'], 'ar' => $class['Name_ar']],
                    'Grade_id' => $class['Grade_id']
                ]);
            }
            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {
            $Classrooms = Classroom::findOrfail($request->id);
            $Classrooms->update([
                'Name_Class' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id
            ]);
            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {
            Classroom::findOrfail($request->id)->delete();
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('Classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function delete_all($request)
	{
        try {
            $classes_id = explode(',', $request->delete_all_id);
            Classroom::destroy($classes_id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('Classrooms.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function filter_classes($request)
	{
        try {
            $Grades = Grade::all();
            $Search = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->get();
            return view('pages.Classrooms.Classrooms', compact('Grades'))->with('details', $Search);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
