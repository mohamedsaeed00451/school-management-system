<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineClassIndirectStore;
use App\Http\Requests\OnlineClassStore;
use App\Interfaces\Teachers\TeacherOnlineClassInterface;
use Illuminate\Http\Request;

class TeacherOnlineClassController extends Controller
{
    private $TeacherOnlineClass;

    public function __construct(TeacherOnlineClassInterface $TeacherOnlineClass)
    {
        $this->TeacherOnlineClass = $TeacherOnlineClass;
    }

    public function index()
    {
        return $this->TeacherOnlineClass->index();
    }

    public function create()
    {
        return $this->TeacherOnlineClass->create();
    }

    public function store(OnlineClassStore $request)
    {
        return $this->TeacherOnlineClass->store($request);
    }

    public function indirectCreate()
    {
        return $this->TeacherOnlineClass->indirectCreate();
    }

    public function indirectStore(OnlineClassIndirectStore $request)
    {
        return $this->TeacherOnlineClass->indirectStore($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        return $this->TeacherOnlineClass->destroy($request);
    }
}
