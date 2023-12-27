<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'venue_id' => 'required|integer',
            'organizer_id' => 'required|integer',
            'event_name' => 'required|max:20',
            'event_desc' => 'required|max:255',
            'resource_id' => 'required|integer',
            'date_sel' => 'required|date_format:d-m-Y',
            'time_sel' => 'required|date_format:H:i A',
        ];
    }
}
