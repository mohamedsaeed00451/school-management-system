<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryUpdate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Title' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'Section_id' => 'required',
        ];
    }
}
