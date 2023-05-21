<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestion;
use App\Interfaces\Teachers\TeacherQuestionInterface;
use Illuminate\Http\Request;

class TeacherQuestionController extends Controller
{
    private $TeacherQuestion;
    public function __construct(TeacherQuestionInterface $TeacherQuestion)
    {
        $this->TeacherQuestion = $TeacherQuestion;
    }

    public function index()
    {
        return $this->TeacherQuestion->index();
    }

    public function create()
    {
        return $this->TeacherQuestion->create();
    }

    public function store(StoreQuestion $request)
    {
        return $this->TeacherQuestion->store($request);
    }

    public function show($id)
    {
        return $this->TeacherQuestion->show($id);
    }

    public function createNew($id)
    {
        return $this->TeacherQuestion->createNew($id);
    }

    public function edit($id)
    {
        return $this->TeacherQuestion->edit($id);
    }

    public function update(StoreQuestion $request)
    {
        return $this->TeacherQuestion->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->TeacherQuestion->destroy($request);
    }
}
