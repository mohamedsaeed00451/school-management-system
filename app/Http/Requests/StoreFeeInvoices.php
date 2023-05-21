<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeInvoices extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Student_id' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'List_Fees.*.Fee_id' => 'required',
            'List_Fees.*.Amount' => 'required',
        ];
    }
}
