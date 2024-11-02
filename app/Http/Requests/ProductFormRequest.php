<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>['required','string'],
            'slug' =>['required','string'],
            'brand' =>['required','string'],
            'image' =>['nullable','image'],
            'price' =>['required','integer'],
            'quantity' =>['required','integer'],
            'cost_of_good' =>['required','integer'],
            'title' =>['required','string'],
            'status' =>['required','boolean'],
            'category_id' =>['required','integer'],
            'trending' =>['required','boolean'],
            'keyword' =>['required','string'],
            'short_description' =>['nullable','string'],
            'description' =>['nullable','string'],
        ];
    }
}
