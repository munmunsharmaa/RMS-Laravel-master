<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'item_name' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'unit_price' => ['required'],
            'status' => ['required'],
        ];
    }
}
