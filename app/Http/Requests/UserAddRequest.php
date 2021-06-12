<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'email'=>'bail|required|email',
            'username' => 'bail|required|unique:users|max:255|min:8',
            'password' => [
                'required',
                'string',
                'min:8',              // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      //Must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm_password'=>'same:password',
            'phone' => 'required|min:10|numeric',
            'image_path' => 'required',
            'address' => 'required',
            'birthday' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.unique'=>'Email already used',
            'password.min'=>'Must be at least 8 characters in length',
            'password.regex'=>'Must contain at least one lowercase, uppercase, digit and special character letter',
        ];
    }
}
