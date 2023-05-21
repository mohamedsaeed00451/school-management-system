<?php

namespace App\Http\Controllers\Students;

use App\Http\Requests\StoreStudents;
use App\Http\Requests\UpdateStudent;
use App\Interfaces\StudentsInterface;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentController extends Controller
{
    public $Student;
    public function __construct(StudentsInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->getStudent();
    }

    public function create()
    {
        return $this->Student->createStudent();
    }

    public function store(StoreStudents $request)
    {
        return $this->Student->storeStudent($request);
    }

    public function show($id)
    {
        return $this->Student->showStudent($id);
    }

    public function edit($id)
    {
        return $this->Student->editStudent($id);
    }

    public function update(UpdateStudent $request)
    {
        return $this->Student->updateStudent($request);
    }

    public function destroy(Request $request)
    {
        return $this->Student->deleteStudent($request);
    }

    public function getClassrooms($id)
    {
        return $this->Student->getClassrooms($id);
    }

    public function getSections($id)
    {
        return $this->Student->getSections($id);
    }

    public function downloadAttachment($StudentsName,$FileName)
    {
        return $this->Student->downloadAttachment($StudentsName,$FileName);
    }

    public function deleteAttachment(Request $request)
    {
        return $this->Student->deleteAttachment($request);
    }

    public function uploadAttachment(Request $request)
    {
        return $this->Student->uploadAttachment($request);
    }
}
