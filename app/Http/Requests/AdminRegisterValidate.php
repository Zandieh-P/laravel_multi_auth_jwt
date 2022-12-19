<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterValidate extends FormRequest
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
            'name' => 'required | max:255 | string',
            'email' => 'required | email | max:255 | unique:users,email',
            'phone' => 'required | min:11 | string | unique:users,phone',
            'password' => 'required | string | min:7 | max:255',
        ];
    }
}
