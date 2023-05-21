<?php

namespace App\Repositories;


use App\Interfaces\FeeInterface;
use App\Models\Fee;
use App\Models\Grade;
use Exception;

class FeeRepository implements FeeInterface
{

    public function index()
    {
        $Fees = Fee::all();
        return view('pages.Expenses.Fees.index', compact('Fees'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Expenses.Fees.add', compact('Grades'));
    }

    public function edit($id)
    {
        $fee = Fee::findOrFail($id);
        $Grades = Grade::all();
        return view('pages.Expenses.Fees.edit', compact('fee', 'Grades'));
    }

    public function store($request)
    {
        try {
            Fee::create([
                'Title' => ['en' => $request->Title_en, 'ar' => $request->Title_ar],
                'Amount' => $request->Amount,
                'Year' => $request->Year,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Notes' => $request->Notes
            ]);

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Fees.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            Fee::findOrFail($request->id)
                ->update([
                    'Title' => ['en' => $request->Title_en, 'ar' => $request->Title_ar],
                    'Amount' => $request->Amount,
                    'Year' => $request->Year,
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Notes' => $request->Notes
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Fees.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fee::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}