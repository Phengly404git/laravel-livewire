<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' =>['required','string'],
            'status' =>['required','boolean'],
            'description'=>['required','string'],
            'image' =>['nullable','image']
        ];
    }
}
