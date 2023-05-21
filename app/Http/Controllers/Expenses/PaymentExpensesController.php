<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\PaymentExpensesStore;
use App\Interfaces\PaymentExpensesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentExpensesController extends Controller
{
    private $Payments;

    public function __construct(PaymentExpensesInterface $Payments)
    {
        $this->Payments = $Payments;
    }
    public function index()
    {
        return $this->Payments->index();
    }

    public function create()
    {
        //
    }

    public function store(PaymentExpensesStore $request)
    {
        return $this->Payments->store($request);
    }

    public function show($id)
    {
        return $this->Payments->show($id);
    }

    public function edit($id)
    {
        return $this->Payments->edit($id);
    }

    public function update(PaymentExpensesStore $request)
    {
        return $this->Payments->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Payments->destroy($request);
    }
}
