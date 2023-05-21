<?php

namespace App\Repositories;


use App\Interfaces\PaymentExpensesInterface;
use App\Models\FundExpenses;
use App\Models\PaymentExpenses;
use App\Models\Student;
use App\Models\StudentAccountExpenses;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

class PaymentExpensesRepository implements PaymentExpensesInterface
{

    public function index()
    {
        $payment_students = PaymentExpenses::all();
        return view('pages.Expenses.payment.index', compact('payment_students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Expenses.payment.add', compact('student'));
    }

    public function edit($id)
    {
        $payment_student = PaymentExpenses::findOrFail($id);
        return view('pages.Expenses.payment.edit', compact('payment_student'));
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();

            $Payment = PaymentExpenses::create([
                'Student_id' => $request->Student_id,
                'Amount' => $request->Amount,
                'Notes' => $request->Notes,
            ]);

            FundExpenses::create([
                'Payment_id' => $Payment->id,
                'Debit' => 0.00,
                'Credit' => $request->Amount,
            ]);

            StudentAccountExpenses::create([
                'Student_id' => $request->Student_id,
                'Payment_id' => $Payment->id,
                'Debit' => $request->Amount,
                'Credit' => 0.00,
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

            PaymentExpenses::findOrFail($request->id)
                ->update([
                    'Amount' => $request->Amount,
                    'Notes' => $request->Notes,
                ]);

            FundExpenses::where('Payment_id', $request->id)
                ->update([
                    'Credit' => $request->Amount,
                ]);

            StudentAccountExpenses::where('Payment_id', $request->id)
                ->update([
                    'Debit' => $request->Amount,
                ]);

            DB::commit();

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('Payments.index');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            PaymentExpenses::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}