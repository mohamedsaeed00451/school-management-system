<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Requests\OnlineClassIndirectStore;
use App\Http\Requests\OnlineClassStore;
use App\Interfaces\OnlineClassInterface;
use App\Models\OnlineClass;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OnlineClassController extends Controller
{
    private $OnlineClass;

    public function __construct(OnlineClassInterface $OnlineClass)
    {
        $this->OnlineClass = $OnlineClass;
    }

    public function index()
    {
      return $this->OnlineClass->index();
    }

    public function create()
    {
        return $this->OnlineClass->create();
    }

    public function store(OnlineClassStore $request)
    {
        return $this->OnlineClass->store($request);
    }

    public function indirectCreate()
    {
        return $this->OnlineClass->indirectCreate();
    }

    public function indirectStore(OnlineClassIndirectStore $request)
    {
        return $this->OnlineClass->indirectStore($request);
    }

    public function show(OnlineClass $onlineClass)
    {
        //
    }

    public function edit(OnlineClass $onlineClass)
    {
        //
    }

    public function update(Request $request, OnlineClass $onlineClass)
    {
        //
    }

    public function destroy(Request $request)
    {
        return $this->OnlineClass->destroy($request);
    }
}
