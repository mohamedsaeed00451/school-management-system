<?php

namespace App\Http\Controllers\Attendances;

use App\Interfaces\AttendanceInterface;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttendanceController extends Controller
{
    private $Attendances;

    public function __construct(AttendanceInterface $Attendances)
    {
        $this->Attendances = $Attendances;
    }

    public function index()
    {
        return $this->Attendances->index();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $this->Attendances->store($request);
    }

    public function show($id)
    {
        return $this->Attendances->show($id);
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
