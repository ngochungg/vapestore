<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price'=>'bail|required|integer',
            'feature_image_path' => 'required',
            'image_path' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'contents' => 'required'
        ];
    }
}
