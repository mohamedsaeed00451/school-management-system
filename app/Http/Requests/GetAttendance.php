<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAttendance extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ];
    }
}