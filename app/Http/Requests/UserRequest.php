<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'avatar.dimensions' => 'The picture is not sharp enough, and the width and height need more than 200px',
            'name.unique' => 'Username is already taken, please re-fill',
            'name.regex' => 'Usernames only support English, numbers, crossbars, and underscores.',
            'name.between' => 'Username must be between 3 - 25 characters.',
            'name.required' => 'Username can not be empty.',
        ];
    }
}
