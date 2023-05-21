<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name_ar' => 'required|unique:grades,Name->ar'.$this->id,
            'Name_en' => 'required|unique:grades,Name->en'.$this->id
        ];
    }
    // public function messages(){
    //     return [
    //         'Name_ar.required'  => trans('validation.required'),
    //         'Name_en.required'  => trans('validation.required'),
    //         'Name_ar.unique'    => trans('validation.unique'),
    //         'Name_en.unique'    => trans('validation.unique'),
    //     ];
    // }
}
