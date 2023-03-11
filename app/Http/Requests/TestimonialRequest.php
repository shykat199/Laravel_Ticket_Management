<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'feedback_text'=>['required'],
            'image'=>['mimes:jpeg,png,jpg,gif,svg','max:10048'],
        ];
    }

    public function messages(): array
    {
        return [
            'feedback_text.required'=>'Please Give Your Valuable Feedback.',
            'image.mimes'=>'Image format should be jpeg,png,jpg,gif,svg.',
            'image.max'=>'Image Size Should Not Be More Then 10 Mb'
        ];
    }
}
