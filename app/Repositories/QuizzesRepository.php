<?php

namespace App\Repositories;

use App\Interfaces\QuizzesInterface;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Notifications\Admins\AddQuizzNotification;
use Exception;
use Illuminate\Support\Facades\Notification;

class QuizzesRepository implements QuizzesInterface
{
    public function index()
    {
        $quizzes = Quizze::all();
        return view('pages.Quizzes.index', compact('quizzes'));
    }
    public function create()
    {
        $data = [
            'subjects' => Subject::all(),
            'grades' => Grade::all(),
            'teachers' => Teacher::all(),
        ];
        return view('pages.Quizzes.create', $data);
    }
    public function edit($id)
    {
        $data = [
            'quizze' => Quizze::findOrFail($id),
            'subjects' => Subject::all(),
            'grades' => Grade::all(),
            'teachers' => Teacher::all(),
        ];
        return view('pages.Quizzes.edit', $data);
    }
    public function store($request)
    {
        try {

           $quizze = Quizze::create([
                'Name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'Teacher_id' => $request->Teacher_id,
                'Section_id' => $request->Section_id,
                'Subject_id' => $request->Subject_id,
            ]);

            // send Notifications
            $students = Student::where('Section_id',$request->Section_id)->get();
            $teacher = Teacher::find($request->Teacher_id);
            Notification::send($students , new AddQuizzNotification($quizze));
            $teacher->notify(new AddQuizzNotification($quizze));

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('quizzes.index');

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
                    'Teacher_id' => $request->Teacher_id,
                    'Section_id' => $request->Section_id,
                    'Subject_id' => $request->Subject_id,
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('quizzes.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            Quizze::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('quizzes.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
