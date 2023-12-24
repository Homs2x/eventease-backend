<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReqRequest extends FormRequest
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
            'request_details' => 'required|string|max:255',
            'request_approval'=>'nullable|',
            'organizer_id'=>'required|integer'
        ];
    }
}
