<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SightSettingRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'key' => ['required','unique:sight_settings'],
            'value' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'key.required' => 'Please Fill The Key Of Sight Setting',
            'key.unique' => 'Key Has Already Been Taken.',
            'value.required' => 'Please Fill The Value Of Sight Setting',
        ];

    }

}
