<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'status' => ['required'],
            'print_qty' => ['required'],
            'table_id' => ['required'],
        ];
    }
}
