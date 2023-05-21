<?php

namespace App\Repositories;

use App\Interfaces\QuestionsInterface;
use App\Models\Question;
use App\Models\Quizze;
use Exception;

class QuestionsRepository implements QuestionsInterface
{
    public function index()
    {
        $questions = Question::all();
        return view('pages.Questions.index', compact('questions'));
    }
    public function create()
    {
        $quizzes = Quizze::all();
        return view('pages.Questions.create', compact('quizzes'));
    }
    public function createNew($id)
    {
        $quizze_data = Quizze::findOrFail($id);
        return view('pages.Questions.create', compact('quizze_data'));
    }
    public function show($id)
    {
        $quizze = Quizze::findOrFail($id);
        $questions = Question::where('Quizze_id', $id)->get();
        return view('pages.Questions.view_questions', compact('questions', 'quizze'));
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizze::all();
        return view('pages.Questions.edit', compact('question', 'quizzes'));
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
            return redirect()->route('questions.index');

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
            return redirect()->route('questions.index');

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            toastr()->success(trans('Message_trans.Delete'));
            return redirect()->route('questions.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}