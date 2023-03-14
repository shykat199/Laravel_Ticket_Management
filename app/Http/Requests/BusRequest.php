<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
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
            'bus_coach'=>['required','unique:bus_details'],
            'company_id'=>['required'],
            'bus_type'=>['required'],
            'bus_seat'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'bus_coach.required'=>'Please Select Bus Coach Number',
            'bus_coach.unique'=>'Please Select Unique Bus Coach Number',
            'company_id.required'=>'Please Select A company Name',
            'bus_seat.required'=>'Please Select A Seat Number',
        ];
    }
}
