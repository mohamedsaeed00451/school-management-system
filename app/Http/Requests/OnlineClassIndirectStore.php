<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineClassIndirectStore extends FormRequest
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
            'Topic' => 'required',
            'Start_time' => 'required',
            'Duration' => 'required',
            'Password' => 'required',
            'Start_url' => 'required',
            'Join_url' => 'required',
            'Meeting_id' => 'required',
        ];
    }
}
