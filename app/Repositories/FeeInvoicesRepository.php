<?php

namespace App\Repositories;


use App\Interfaces\FeeInvoicesInterface;
use App\Models\Fee;
use App\Models\FeeInvoice;
use App\Models\MyParent;
use App\Models\Student;
use App\Models\StudentAccountExpenses;
use App\Notifications\parents\AddInvoiceStudentNotification;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

class FeeInvoicesRepository implements FeeInvoicesInterface
{

    public function index()
    {
        $Fee_invoices = FeeInvoice::all();
        return view('pages.Expenses.Fees_Invoices.index', compact('Fee_invoices'));
    }

    public function show($id)
    {
        $student = Student::findOrfail($id);
        $fees = Fee::all();
        return view('pages.Expenses.Fees_Invoices.add', compact('student', 'fees'));
    }

    public function edit($id)
    {
        $fee_invoices = FeeInvoice::findOrFail($id);
        $fees = Fee::all();
        return view('pages.Expenses.Fees_Invoices.edit', compact('fee_invoices', 'fees'));
    }

    public function store($request)
    {
        try {

            $List_Fees = $request->List_Fees;
            DB::beginTransaction();

            foreach ($List_Fees as $List_Fee) {

                $Fee_Invoice = FeeInvoice::create([
                    'Student_id' => $request->Student_id,
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Fee_id' => $List_Fee['Fee_id'],
                    'Amount' => $List_Fee['Amount'],
                    'Notes' => $List_Fee['Notes'],
                ]);

                StudentAccountExpenses::create([
                    'Student_id' => $request->Student_id,
                    'Fee_invoice_id' => $Fee_Invoice->id,
                    'Debit' => $List_Fee['Amount'],
                    'Credit' => 0.00,
                ]);

            }

            //send Notifications
            $student = Student::find($request->Student_id);
            $parent = MyParent::find($student->Parent_id);
            $parent->notify(new AddInvoiceStudentNotification($student));

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

            FeeInvoice::findOrFail($request->id)
                ->update([
                    'Fee_id' => $request->Fee_id,
                    'Amount' => $request->Amount,
                    'Notes' => $request->Notes,
                ]);

            StudentAccountExpenses::where('Fee_invoice_id', $request->id)
                ->update([
                    'Debit' => $request->Amount,
                ]);

            DB::commit();

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Fee_invoices.index');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            FeeInvoice::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
