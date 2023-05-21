<?php

namespace App\Http\Controllers\Students\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentQuizzesController extends Controller
{

    public function index()
    {
        $quizzes = Quizze::where('Grade_id',auth()->user()->Grade_id)
            ->where('Classroom_id',auth()->user()->Classroom_id)
            ->where('Section_id',auth()->user()->Section_id)
            ->get();
        return view('pages.Students.Dashboard.Quizzes.index',compact('quizzes'));
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
        $quizze = Quizze::findOrFail($id);
        if ($quizze->question()->count() < 1) {
            toastr()->warning(trans('Message_trans.No_Data'));
            return redirect()->back();
        }
        $student_id = Auth::user()->id;
        return view('pages.Students.Dashboard.Quizzes.show',compact('quizze','student_id'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
