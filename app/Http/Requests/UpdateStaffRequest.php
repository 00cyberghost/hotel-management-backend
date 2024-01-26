<?php

namespace App\Http\Requests;

namespace App\Http\Requests;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:25'],
            'role' => ['required', 'string', 'max:50', 'min:5'],
            'job_description' => ['required', 'string', 'max:2000'],
            'gender' => ['required', 'string', 'max:6', 'min:4'],
            'address' => ['required', 'string', 'max:180', 'min:3'],
        ];
    }
}
