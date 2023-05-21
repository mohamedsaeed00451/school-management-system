<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSections extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name_ar'   => 'required',
            'Name_en'   => 'required',
            'Grade_id'  => 'required',
            'Classroom_id'  => 'required',
        ];
    }
    // public function messages(){
    //     return [
    //         'Name_ar.required'      => trans('validation.required'),
    //         'Name_en.required'      => trans('validation.required'),
    //         'Grade_id.required'     => trans('validation.required'),
    //         'Class_id.required'     => trans('validation.required'),
    //     ];
    // }
}
