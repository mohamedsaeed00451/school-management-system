<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherStoreQuizze;
use App\Interfaces\Teachers\TeacherQuizzeInterface;
use Illuminate\Http\Request;

class TeacherQuizzeController extends Controller
{
    private $TeacherQuizze;
    public function __construct(TeacherQuizzeInterface $TeacherQuizze)
    {
        $this->TeacherQuizze = $TeacherQuizze;
    }

    public function index()
    {
        return $this->TeacherQuizze->index();
    }

    public function create()
    {
        return $this->TeacherQuizze->create();
    }

    public function store(TeacherStoreQuizze $request)
    {
        return $this->TeacherQuizze->store($request);
    }

    public function show($id)
    {
        return $this->TeacherQuizze->show($id);
    }

    public function edit($id)
    {
        return $this->TeacherQuizze->edit($id);
    }

    public function update(TeacherStoreQuizze $request)
    {
        return $this->TeacherQuizze->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->TeacherQuizze->destroy($request);
    }

    public function getQuizzesDegrees()
    {
        return $this->TeacherQuizze->getQuizzesDegrees();
    }

    public function repetQuizzesDegrees($id)
    {
        return $this->TeacherQuizze->repetQuizzesDegrees($id);
    }
}
