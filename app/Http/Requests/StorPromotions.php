<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorPromotions extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'Section_id' => 'required',
            'Grade_id_new' => 'required',
            'Classroom_id_new' => 'required',
            'Section_id_new' => 'required',
            'Academic_year' => 'required',
            'Academic_year_new' => 'required',
        ];
    }
}
