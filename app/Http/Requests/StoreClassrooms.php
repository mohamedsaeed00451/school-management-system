<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassrooms extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'List_Classes.*.Name_ar'  => 'required',
            'List_Classes.*.Name_en'  => 'required',
            'List_Classes.*.Grade_id' => 'required',
        ];
    }
    // public function messages(){
    //     return [
    //         'Name_ar.required'  => trans('validation.required'),
    //         'Name_en.required'  => trans('validation.required'),
    //         'Grade_id.required' => trans('validation.required'),
    //     ];
    // }
}
