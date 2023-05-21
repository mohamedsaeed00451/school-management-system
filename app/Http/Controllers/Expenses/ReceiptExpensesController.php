<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\ReceiptExpensesStore;
use App\Interfaces\ReceiptExpensesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReceiptExpensesController extends Controller
{
    private $Receipt;

    public function __construct(ReceiptExpensesInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }
    public function index()
    {
        return $this->Receipt->index();
    }

    public function create()
    {
        //
    }

    public function store(ReceiptExpensesStore $request)
    {
        return $this->Receipt->store($request);
    }

    public function show($id)
    {
        return $this->Receipt->show($id);
    }

    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }

    public function update(ReceiptExpensesStore $request)
    {
        return $this->Receipt->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}
