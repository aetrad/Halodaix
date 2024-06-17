<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpartanStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'pv' => 'required|integer',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ];
    }
}


