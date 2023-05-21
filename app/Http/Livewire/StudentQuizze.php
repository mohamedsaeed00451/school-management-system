<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Livewire\Component;
use Mockery\Exception;

class StudentQuizze extends Component
{
    public  $student_id,
            $quizze_id,
            $data,
            $catchError,
            $CustomRadio,
            $counter = 0,
            $questionsCount = 0;

    public function render()
    {
        $this->data = Question::where('Quizze_id',$this->quizze_id)->get();
        $this->questionsCount = $this->data->count();
        return view('livewire.Students.student-quizze',['data']);
    }

    public function nextQuestion($question_id,$score,$answer,$right_answer)
    {
        $studentDegrees = Degree::where('Quizze_id',$this->quizze_id)
            ->where('Student_id',$this->student_id)
            ->first();

        $scoreQuestion = 0;
        if (strcmp(trim($answer),trim($right_answer)) === 0) {
            $scoreQuestion = $score;
        }

        if ($studentDegrees == null) {

            try {
                Degree::create([
                    'Quizze_id' => $this->quizze_id,
                    'Student_id' => $this->student_id,
                    'Question_id' => $question_id,
                    'Score' => $scoreQuestion,
                    'Date' => date('Y-m-d')
                ]);
            } catch (Exception $e) {
                $this->catchError = $e->getMessage();
            }

        } else {

            if ($studentDegrees->Question_id >= $question_id) {

                try {
                    $this->CustomRadio = '';
                    $studentDegrees->update([
                            'Abuse' => 1,
                            'Score' => 0,
                        ]);

                    toastr()->error(trans('Message_trans.abuse'));
                    return redirect('/student/studentQuizzes');

                } catch (Exception $e) {
                    $this->catchError = $e->getMessage();
                }

            } else {

                try {
                    $studentDegrees->update([
                        'Question_id' => $question_id,
                        'Score' => $studentDegrees->Score + $scoreQuestion,
                    ]);
                } catch (Exception $e) {
                    $this->catchError = $e->getMessage();
                }

            }

        }


        if ($this->counter < $this->questionsCount -1 ) {

            $this->CustomRadio = '';
            $this->counter ++;


        } else {

            $this->CustomRadio = '';
            toastr()->success(trans('Message_trans.quizze_success'));
            return redirect('/student/studentQuizzes');

        }

    }

}
