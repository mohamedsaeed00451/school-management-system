<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\StoreFeeInvoices;
use App\Http\Requests\UpdateFeeInvoices;
use App\Interfaces\FeeInvoicesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeeInvoiceController extends Controller
{
    private $Fee_Invoices;

    public function __construct(FeeInvoicesInterface $Fee_Invoices)
    {
        $this->Fee_Invoices = $Fee_Invoices;
    }
    public function index()
    {
        return $this->Fee_Invoices->index();
    }

    public function create()
    {
        //
    }

    public function store(StoreFeeInvoices $request)
    {
        return $this->Fee_Invoices->store($request);
    }

    public function show($id)
    {
        return $this->Fee_Invoices->show($id);
    }

    public function edit($id)
    {
        return $this->Fee_Invoices->edit($id);
    }

    public function update(UpdateFeeInvoices $request)
    {
        return $this->Fee_Invoices->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Fee_Invoices->destroy($request);
    }
}
