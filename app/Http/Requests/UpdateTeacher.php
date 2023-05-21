<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacher extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name_ar'           => 'required',
            'Name_en'           => 'required',
            'Email'             => 'required|unique:teachers,email,' . $this->id,
            'Specialization_id' => 'required',
            'Gender_id'         => 'required',
            'Joining_Date'      => 'required',
            'Address'           => 'required',
        ];
    }
}
