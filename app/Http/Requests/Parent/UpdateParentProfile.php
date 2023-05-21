<?php

namespace App\Http\Requests\Parent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentProfile extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name_Father_ar' => 'required',
            'Name_Father_en' => 'required',
        ];
    }
}
