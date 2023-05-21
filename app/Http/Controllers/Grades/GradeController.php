<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Interfaces\GradesInterface;
use App\Models\Grade;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    private $Grades;

    public function __construct(GradesInterface $Grades)
    {
        $this->Grades = $Grades;
    }

    public function index()
    {
        return $this->Grades->index();
    }

    public function create()
    {
        //
    }

    public function store(StoreGrades $request)
    {
        return $this->Grades->store($request);
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

    public function update(StoreGrades $request)
    {
        return $this->Grades->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Grades->destroy($request);
    }
}
