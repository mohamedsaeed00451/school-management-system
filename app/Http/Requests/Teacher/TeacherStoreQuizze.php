<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreQuizze extends FormRequest
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
            'Subject_id' => 'required',
            'Section_id' => 'required',
        ];
    }
}
