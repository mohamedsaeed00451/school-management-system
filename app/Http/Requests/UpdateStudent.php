<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudent extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:students,email,' . $this->id,
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'Section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
    }
}
