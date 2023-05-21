<?php

namespace App\Repositories\Teachers;

use App\Interfaces\Teachers\TeacherQuestionInterface;
use App\Models\Question;
use App\Models\Quizze;
use Exception;

class TeacherQuestionRepository implements TeacherQuestionInterface
{

	public function index()
	{
        $quizzes_ids = Quizze::where('Teacher_id', auth()->user()->id)->pluck('id');
        $questions = Question::whereIn('Quizze_id', $quizzes_ids)->get();
        return view('pages.Teachers.Dashboard.Questions.index', compact('questions'));
	}

	public function create()
	{
        $quizzes = Quizze::where('Teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.Dashboard.Questions.create', compact('quizzes'));
	}

	public function show($id)
	{
        $quizze = Quizze::findOrFail($id);
        $questions = Question::where('Quizze_id', $id)->get();
        return view('pages.Teachers.Dashboard.Questions.view_questions', compact('questions', 'quizze'));
	}

	public function createNew($id)
	{
        $quizze_data = Quizze::findOrFail($id);
        return view('pages.Teachers.Dashboard.Questions.create', compact('quizze_data'));
	}

	public function edit($id)
	{
        $question = Question::findOrFail($id);
        $quizzes = Quizze::where('Teacher_id', auth()->user()->id)->get();
        return view('pages.Teachers.Dashboard.Questions.edit', compact('question', 'quizzes'));
	}

	public function store($request)
	{
        try {

            Question::create([
                'Title' => $request->Title,
                'Answers' => $request->Answers,
                'Right_answer' => $request->Right_answer,
                'Score' => $request->Score,
                'Quizze_id' => $request->Quizze_id,
            ]);

            toastr()->success(trans('Message_trans.Success'));
            return redirect()->route('teacherQuestions.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function update($request)
	{
        try {

            Question::findOrFail($request->id)
                ->update([
                    'Title' => $request->Title,
                    'Answers' => $request->Answers,
                    'Right_answer' => $request->Right_answer,
                    'Score' => $request->Score,
                    'Quizze_id' => $request->Quizze_id,
                ]);

            toastr()->success(trans('Message_trans.Update'));
            return redirect()->route('teacherQuestions.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}

	public function destroy($request)
	{
        try {
            Question::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('teacherQuestions.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}
}
