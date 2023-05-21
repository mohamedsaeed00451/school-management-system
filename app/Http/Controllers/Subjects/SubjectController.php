<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Requests\SubjectsStore;
use App\Interfaces\SubjectsInterface;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubjectController extends Controller
{
    private $Subjects;
    public function __construct(SubjectsInterface $Subjects)
    {
        $this->Subjects = $Subjects;
    }
    public function index()
    {
        return $this->Subjects->index();
    }

    public function create()
    {
        return $this->Subjects->create();
    }

    public function store(SubjectsStore $request)
    {
        return $this->Subjects->store($request);
    }

    public function show(Subject $subject)
    {
        //
    }

    public function edit($id)
    {
        return $this->Subjects->edit($id);
    }

    public function update(SubjectsStore $request)
    {
        return $this->Subjects->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subjects->destroy($request);
    }

}
