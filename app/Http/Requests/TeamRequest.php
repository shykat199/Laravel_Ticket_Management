<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'member_name'=>['required','max:15','unique:teams'],
            'member_role'=>['required'],
            'member_image'=>['required','mimes:jpeg,png,jpg,gif,svg','max:10048'],

        ];
    }

    public function messages(): array
    {
        return[
            'member_name.required'=>'Please Select Member Name',
            'member_name.unique'=>'Member Name Should Be Unique',
            'member_image.required'=>'Please Select Member Image',
            'member_image.mimes'=>'Image Format Should Be jpeg,png,jpg,gif or svg',
            'member_image.max'=>'Image Size Should Not More Then 10 Mb',
        ];
    }
}
