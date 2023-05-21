<?php

namespace App\Repositories;

use App\Interfaces\StudentsPromotionsInterface;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentsPromotionsRepository implements StudentsPromotionsInterface
{
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Students.Promotions.index', compact('Grades'));
    }

    public function create()
    {
        $promotions = promotion::all();
        return view('pages.Students.Promotions.management', compact('promotions'));
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $Students = Student::where('Grade_id', $request->Grade_id)
                ->where('Classroom_id', $request->Classroom_id)
                ->where('Section_id', $request->Section_id)
                ->where('Academic_year', $request->Academic_year)
                ->get();

            if ($Students->count() < 1) {
                toastr()->error(trans('Message_trans.No_Data'));
                return redirect()->route('Promotions.index');
            }

            foreach ($Students as $Student) {
                $ids = explode(',', $Student->id);
                //Update Students Table
                Student::whereIn('id', $ids)->update([
                    'Grade_id' => $request->Grade_id_new,
                    'Classroom_id' => $request->Classroom_id_new,
                    'Section_id' => $request->Section_id_new,
                    'Academic_year' => $request->Academic_year_new,
                ]);
                //Insert Or Update Promotions Table
                Promotion::updateOrCreate([
                    'Student_id' => $Student->id,
                    'From_grade' => $request->Grade_id,
                    'From_Classroom' => $request->Classroom_id,
                    'From_section' => $request->Section_id,
                    'To_grade' => $request->Grade_id_new,
                    'To_Classroom' => $request->Classroom_id_new,
                    'To_section' => $request->Section_id_new,
                    'Academic_year' => $request->Academic_year,
                    'Academic_year_new' => $request->Academic_year_new,
                ]);
            }

            DB::commit();
            toastr()->success(trans('Message_trans.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {

            DB::beginTransaction();

            if ($request->page_id == 2) {

                Student::where('id', $request->id)->Delete();
                Promotion::where('Student_id', $request->id)->Delete();

                DB::commit();
                toastr()->success(trans('Message_trans.Update'));
                return redirect()->back();

            } elseif ($request->page_id == 1) {

                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion) {
                    $ids = explode(',', $Promotion->Student_id);
                    student::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $Promotion->From_grade,
                            'Classroom_id' => $Promotion->From_classroom,
                            'Section_id' => $Promotion->From_section,
                            'Academic_year' => $Promotion->Academic_year,
                        ]);
                }

                Promotion::truncate();

                toastr()->success(trans('Message_trans.Update'));
                return redirect()->back();

            } else {

                $Promotion = Promotion::findOrFail($request->id);

                student::where('id', $Promotion->Student_id)
                    ->update([
                        'Grade_id' => $Promotion->From_grade,
                        'Classroom_id' => $Promotion->From_classroom,
                        'Section_id' => $Promotion->From_section,
                        'Academic_year' => $Promotion->Academic_year,
                    ]);

                Promotion::where('id', $request->id)->forceDelete();

                DB::commit();
                toastr()->success(trans('Message_trans.Success'));
                return redirect()->back();

            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}