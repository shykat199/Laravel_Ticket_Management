<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
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
            'post_title'=>['required','unique:posts'],
            'post_category'=>['required'],
            'post_image'=>['required','mimes:jpeg,png,jpg,gif,svg','max:10048'],
            'post_description'=>['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'post_title.required'=>'Please Select The Post Title',
            'post_title.unique'=>'Post Title Already Stored',
            'post_image.required'=>'Please Select An Image For Your Post',
            'post_image.mimes'=>'Wrong File Format. File Format Should Be jpeg,png,jpg,gif,svg',
            'post_description.required'=>'Please Select The Post Description',
        ];
    }
}
