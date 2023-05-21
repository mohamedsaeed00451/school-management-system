<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizzesStore extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'Teacher_id' => 'required',
            'Subject_id' => 'required',
            'Section_id' => 'required',
        ];
    }
}
