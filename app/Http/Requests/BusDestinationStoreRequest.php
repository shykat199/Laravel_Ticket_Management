<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusDestinationStoreRequest extends FormRequest
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
            'bus_details_id' => ['required'],
            'starting_point' => ['required'],
            'arrival_point' => ['required'],
            'departure_time' => ['required'],
            'arrival_time' => ['required'],
            'ticket_price' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'bus_details_id.required' => 'Please Select Bus Coach Number.',
            'starting_point.required' => 'Please Select Bus Starting Point',
            'arrival_point.required' => 'Please Select Bus Arrival Point.',
            'departure_time.required' => 'Please Select Bus Departure Time.',
            'arrival_time.required' => 'Please Select Bus Arrival Time.',
            'ticket_price.required' => 'Please Select Seat Price.',
        ];
    }
}
