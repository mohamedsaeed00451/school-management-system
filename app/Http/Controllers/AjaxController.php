<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Section;

class AjaxController extends Controller
{
    //Get Classrooms
    public function getClassrooms($id)
    {
        return Classroom::where('Grade_id', $id)->pluck('Name_Class', 'id');
    }

    //Store Sections
    public function getSections($id)
    {
        return Section::where('Class_id', $id)->pluck('Name_Section', 'id');
    }
}
