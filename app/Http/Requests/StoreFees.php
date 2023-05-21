<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFees extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Title_en' => 'required',
            'Title_ar' => 'required',
            'Amount' => 'required',
            'Year' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
        ];
    }
}
