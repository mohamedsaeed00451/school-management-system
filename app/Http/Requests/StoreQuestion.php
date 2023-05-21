<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestion extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Title' => 'required',
            'Answers' => 'required',
            'Right_answer' => 'required',
            'Score' => 'required',
            'Quizze_id' => 'required',
        ];
    }
}
