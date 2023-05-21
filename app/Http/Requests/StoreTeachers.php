<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'Password'          => 'required|min:8',
            'Specialization_id' => 'required',
            'Gender_id'         => 'required',
            'Joining_Date'      => 'required',
            'Address'           => 'required',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'Name_ar.required'              => trans('validation.required'),
    //         'Name_en.required'              => trans('validation.required'),
    //         'Email.required'                => trans('validation.required'),
    //         'Email.unique'                  => trans('validation.unique'),
    //         'Password.required'             => trans('validation.required'),
    //         'Password.min'                  => trans('validation.min'),
    //         'Specialization_id.required'    => trans('validation.required'),
    //         'Gender_id.required'            => trans('validation.required'),
    //         'Address.required'              => trans('validation.required'),
    //         'Joining_Date.required'         => trans('validation.required'),
    //     ];
    // }
}
