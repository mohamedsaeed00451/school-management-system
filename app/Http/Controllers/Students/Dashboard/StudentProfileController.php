<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherProfile;
use App\Interfaces\Students\StudentProfileInterface;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    private $StudentProfile;

    public function __construct(StudentProfileInterface $StudentProfile)
    {
        $this->StudentProfile = $StudentProfile;
    }

    public function index()
    {
        return $this->StudentProfile->index();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(TeacherProfile $request)
    {
        return $this->StudentProfile->update($request);
    }

    public function destroy($id)
    {
        //
    }
}
