<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>['required','email'],
            'password'=>['required','max:10','min:8']
        ];
    }

    public function messages(): array
    {
        return[
            'email.required'=>'Please Select Email',
            'email.unique'=>'Email Has Already Taken',
            'password.required'=>'Please Select Password',
            'password.max'=>'Password Should Not Be More Then 10 Digit',
            'password.min'=>'Password Should Not Be Less Then 8 Digit',
        ];
    }
}
