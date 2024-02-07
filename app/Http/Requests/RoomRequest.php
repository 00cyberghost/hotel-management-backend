<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class RoomRequest extends FormRequest
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
            'number' => ['required', 'min:1','max:40', 'unique:'.Room::class],
            'type' => ['required', 'string','min:1','max:100'],
            'capacity' => ['required', 'numeric', 'max:1000000','min:1'],
            'bed' => ['required', 'max:50', 'min:1'],
            'bathroom' => ['required', 'max:50', 'min:1'],
            'kitchen' => ['required', 'max:50', 'min:1'],
            'description' => ['required', 'string', 'max:5000','min:1'],
            'price' => ['required', 'numeric', 'min:1','max:100000000'],
            'tax' => ['required', 'numeric', 'min:1','max:100000000'],
        ];
    }
}
