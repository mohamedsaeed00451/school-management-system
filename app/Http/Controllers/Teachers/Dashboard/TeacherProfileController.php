<?php

namespace App\Http\Controllers\Teachers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherProfile;
use App\Interfaces\Teachers\TeacherProfileInterface;
use Illuminate\Http\Request;

class TeacherProfileController extends Controller
{
    private $TeacherProfile;

    public function __construct(TeacherProfileInterface $TeacherProfile)
    {
        $this->TeacherProfile = $TeacherProfile;
    }

    public function index()
    {
        return $this->TeacherProfile->index();
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
        return $this->TeacherProfile->update($request);
    }

    public function destroy($id)
    {
        //
    }
}
