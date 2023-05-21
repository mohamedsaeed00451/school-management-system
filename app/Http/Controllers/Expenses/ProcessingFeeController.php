<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\ProcessingFeeStore;
use App\Interfaces\ProcessingFeesInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProcessingFeeController extends Controller
{
    private $ProcessingFees;

    public function __construct(ProcessingFeesInterface $ProcessingFees)
    {
        $this->ProcessingFees = $ProcessingFees;
    }
    public function index()
    {
        return $this->ProcessingFees->index();
    }

    public function create()
    {
        //
    }

    public function store(ProcessingFeeStore $request)
    {
        return $this->ProcessingFees->store($request);
    }

    public function show($id)
    {
        return $this->ProcessingFees->show($id);
    }

    public function edit($id)
    {
        return $this->ProcessingFees->edit($id);
    }

    public function update(ProcessingFeeStore $request)
    {
        return $this->ProcessingFees->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->ProcessingFees->destroy($request);
    }
}
