<?php

namespace App\Repositories;


use App\Interfaces\ProcessingFeesInterface;
use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccountExpenses;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

class ProcessingFeesRepository implements ProcessingFeesInterface
{

    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        return view('pages.Expenses.ProcessingFee.index', compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Expenses.ProcessingFee.add', compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findOrFail($id);
        return view('pages.Expenses.ProcessingFee.edit', compact('ProcessingFee'));
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $Processing = ProcessingFee::create([
                'Student_id' => $request->Student_id,
                'Amount' => $request->Amount,
                'Notes' => $request->Notes,
            ]);

            StudentAccountExpenses::create([
                'Student_id' => $request->Student_id,
                'Processing_id' => $Processing->id,
                'Debit' => 0.00,
                'Credit' => $request->Amount,
            ]);

            DB::commit();

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('Students.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            DB::beginTransaction();

            ProcessingFee::findOrFail($request->id)
                ->update([
                    'Amount' => $request->Amount,
                    'Notes' => $request->Notes,
                ]);

            StudentAccountExpenses::where('Processing_id', $request->id)
                ->update([
                    'Credit' => $request->Amount,
                ]);

            DB::commit();

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Processing_fees.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessingFee::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}