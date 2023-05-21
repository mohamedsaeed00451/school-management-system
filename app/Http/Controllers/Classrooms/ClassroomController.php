<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Requests\StoreClassrooms;
use App\Http\Requests\UpdateClassrooms;
use App\Interfaces\ClassroomsInterface;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClassroomController extends Controller
{
    private $Classrooms;

    public function __construct(ClassroomsInterface $Classrooms)
    {
        $this->Classrooms = $Classrooms;
    }
    public function index()
    {
        return $this->Classrooms->index();
    }

    public function create()
    {
        //
    }

    public function store(StoreClassrooms $request)
    {
        return $this->Classrooms->store($request);
    }

    public function show(Classroom $classroom)
    {
        //
    }

    public function edit(Classroom $classroom)
    {
        //
    }

    public function update(UpdateClassrooms $request)
    {
        return $this->Classrooms->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Classrooms->destroy($request);
    }
    public function delete_all(Request $request)
    {
        return $this->Classrooms->delete_all($request);
    }
    public function filter_classes(Request $request)
    {
        return $this->Classrooms->filter_classes($request);
    }
}
