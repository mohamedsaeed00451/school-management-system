<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Requests\StoreFees;
use App\Interfaces\FeeInterface;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeeController extends Controller
{

    private $Fee;

    public function __construct(FeeInterface $Fee)
    {
        $this->Fee = $Fee;
    }

    public function index()
    {
        return $this->Fee->index();
    }

    public function create()
    {
        return $this->Fee->create();
    }

    public function store(StoreFees $request)
    {
        return $this->Fee->store($request);
    }

    public function show(Fee $fee)
    {
        //
    }

    public function edit($id)
    {
        return $this->Fee->edit($id);
    }

    public function update(StoreFees $request)
    {
        return $this->Fee->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Fee->destroy($request);
    }
}
