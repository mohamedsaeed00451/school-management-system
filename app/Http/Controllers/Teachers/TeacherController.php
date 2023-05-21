<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Requests\StoreTeachers;
use App\Http\Requests\UpdateTeacher;
use App\Interfaces\TeachersInterface;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TeacherController extends Controller
{
    private $Teacher;
    public function __construct(TeachersInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        return $this->Teacher->getTeachers();

    }

    public function create()
    {
        return $this->Teacher->createTeachers();
    }

    public function store(StoreTeachers $request)
    {
        return $this->Teacher->storeTeacher($request);
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit($id)
    {
        return $this->Teacher->editTeacher($id);

    }

    public function update(UpdateTeacher $request)
    {
        return $this->Teacher->updateTeacher($request);
    }

    public function destroy(Request $request)
    {
        return $this->Teacher->deleteTeacher($request);
    }
}
