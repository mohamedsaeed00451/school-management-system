<?php

namespace App\Repositories\Teachers;

use App\Interfaces\Teachers\TeacherQuizzeInterface;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Student;
use App\Models\Subject;
use App\Notifications\Admins\AddQuizzNotification;
use Exception;
use Illuminate\Support\Facades\Notification;

class TeacherQuizzeRepository implements TeacherQuizzeInterface
{

	public function index()
	{
        $quizzes = Quizze::where('Teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.Dashboard.Quizzes.index', compact('quizzes'));
	}

	public function create()
	{
        $grades = Grade::all();
        $subjects = Subject::where('Teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.Dashboard.Quizzes.create', compact('grades', 'subjects'));
	}

    public function show($id)
    {
        $degrees = Degree::where('Quizze_id',$id)->get();
        return view('pages.Teachers.Dashboard.Quizzes.show',compact('degrees'));
    }

	public function edit($id)
	{
        $data = [
            'quizze' => Quizze::findOrFail($id),
            'subjects' => Subject::where('Teacher_id', auth()->user()->id)->get(),
            'grades' => Grade::all(),
        ];
        return view('pages.Teachers.Dashboard.Quizzes.edit', $data);
	}

	public function store($request)
	{
        try {

            $quizze = Quizze::create([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Teacher_id' => auth()->user()->id,
                'Section_id' => $request->Section_id,
                'Subject_id' => $request->Subject_id,
            ]);

            // send Notifications
            $students = Student::where('Section_id',$request->Section_id)->get();
            Notification::send($students , new AddQuizzNotification($quizze));

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('teacherQuizzes.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {

            Quizze::findOrFail($request->id)
                ->update([
                    'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Section_id' => $request->Section_id,
                    'Subject_id' => $request->Subject_id,
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('teacherQuizzes.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {
            Quizze::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('teacherQuizzes.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
    public function getQuizzesDegrees()
    {
        $quizze_ids = Quizze::where('Teacher_id',auth()->user()->id)->pluck('id');
        $degrees = Degree::whereIn('Quizze_id',$quizze_ids)->get();
        return view('pages.Teachers.Dashboard.Quizzes.show',compact('degrees'));
    }

    public function repetQuizzesDegrees($id)
    {
        try {

            Degree::destroy($id);
            toastr()->success(trans('Message_trans.reopen_quizze'));
            return redirect()->route('teacher.quizzes.report');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
