<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowResultRequest extends FormRequest
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
            'starting_point'=>['required'],
            'arrival_point'=>['required'],
            'dateOfJourney'=>['required'],
            'totalPerson'=>['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'starting_point.required'=>'Please Select Starting Point',
            'arrival_point.required'=>'Please Select Arrival Point',
            'dateOfJourney.required'=>'Please Select Starting Point',
            'totalPerson.required'=>'Please Select At-last 1 Person',
        ];
    }
}
