<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorGraduate;
use App\Interfaces\StudentsGraduateInterface;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{

    private $Graduate;

    public function __construct(StudentsGraduateInterface $Graduate)
    {
        $this->Graduate = $Graduate;
    }

    public function index()
    {
        return $this->Graduate->index();
    }

    public function create()
    {
        return $this->Graduate->create();
    }

    public function store(StorGraduate $request)
    {
        return $this->Graduate->softDelete($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        return $this->Graduate->returnStudentBack($request);
    }

    public function destroy(Request $request)
    {
        return $this->Graduate->destroy($request);
    }
}
