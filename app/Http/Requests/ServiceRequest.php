<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_title' => ['required'],
            'service_text' => ['required'],
            'service_logo' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:10048'],
        ];
    }

    public function messages(): array
    {
        return [
            'service_title.required' => 'Please Select Service Title',
            'service_text.required' => 'Please Select Service text',
            'service_logo.required' => 'Please Select An Image For Your Post',
            'service_logo.mimes' => 'Wrong File Format. File Format Should Be jpeg,png,jpg,gif,svg',
        ];
    }
}
