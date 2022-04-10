<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'table_name' => ['required', 'string', 'max:255'],
            'status' => ['required'],
        ];
    }
}
