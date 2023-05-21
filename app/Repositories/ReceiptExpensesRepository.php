<?php

namespace App\Repositories;


use App\Interfaces\ReceiptExpensesInterface;
use App\Models\FundExpenses;
use App\Models\ReceiptExpenses;
use App\Models\Student;
use App\Models\StudentAccountExpenses;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

class ReceiptExpensesRepository implements ReceiptExpensesInterface
{

    public function index()
    {
        $receipt_students = ReceiptExpenses::all();
        return view('pages.Expenses.Receipt.index', compact('receipt_students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Expenses.Receipt.add', compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = ReceiptExpenses::findOrFail($id);
        return view('pages.Expenses.Receipt.edit', compact('receipt_student'));
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $Receipt = ReceiptExpenses::create([
                'Student_id' => $request->Student_id,
                'Amount' => $request->Amount,
                'Notes' => $request->Notes,
            ]);

            FundExpenses::create([
                'Receipt_id' => $Receipt->id,
                'Debit' => $request->Amount,
                'Credit' => 0.00,
            ]);

            StudentAccountExpenses::create([
                'Student_id' => $request->Student_id,
                'Receipt_id' => $Receipt->id,
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

            ReceiptExpenses::findOrFail($request->id)
                ->update([
                    'Amount' => $request->Amount,
                    'Notes' => $request->Notes,
                ]);

            FundExpenses::where('Receipt_id', $request->id)
                ->update([
                    'Debit' => $request->Amount,
                ]);

            StudentAccountExpenses::where('Receipt_id', $request->id)
                ->update([
                    'Credit' => $request->Amount,
                ]);

            DB::commit();

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Receipts.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptExpenses::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}