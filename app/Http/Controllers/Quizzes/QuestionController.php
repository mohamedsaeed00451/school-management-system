<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Requests\StoreQuestion;
use App\Interfaces\QuestionsInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuestionController extends Controller
{
    private $Questions;
    public function __construct(QuestionsInterface $Questions)
    {
        $this->Questions = $Questions;
    }
    public function index()
    {
        return $this->Questions->index();
    }

    public function create()
    {
        return $this->Questions->create();
    }

    public function store(StoreQuestion $request)
    {
        return $this->Questions->store($request);
    }

    public function show($id)
    {
        return $this->Questions->show($id);
    }

    public function edit($id)
    {
        return $this->Questions->edit($id);
    }

    public function update(StoreQuestion $request)
    {
        return $this->Questions->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Questions->destroy($request);
    }
    public function createNew($id)
    {
        return $this->Questions->createNew($id);
    }

}
