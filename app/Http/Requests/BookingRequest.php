<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'room_id' => ['required'],
            'name' => ['required', 'string', 'min:2', 'max:40'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:190'],
            'phone' => ['required', 'string', 'min:2' , 'max:15'],
            'checkin_date' => ['required', 'string', 'max:20', 'min:5'],
            'checkout_date' => ['required', 'string', 'max:20','min:5'],
            'payment' => ['required', 'numeric','min:1'],
            'no_of_persons' => ['required', 'numeric','min:1'],
        ];
    }
}
