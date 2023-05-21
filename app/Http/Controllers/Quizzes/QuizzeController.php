<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Requests\QuizzesStore;
use App\Interfaces\QuizzesInterface;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuizzeController extends Controller
{
    private $Quizzes;
    public function __construct(QuizzesInterface $Quizzes)
    {
        $this->Quizzes = $Quizzes;
    }
    public function index()
    {
        return $this->Quizzes->index();
    }

    public function create()
    {
        return $this->Quizzes->create();
    }

    public function store(QuizzesStore $request)
    {
        return $this->Quizzes->store($request);
    }

    public function show(Quizze $quizze)
    {
        //
    }

    public function edit($id)
    {
        return $this->Quizzes->edit($id);
    }

    public function update(QuizzesStore $request)
    {
        return $this->Quizzes->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Quizzes->destroy($request);
    }
}
