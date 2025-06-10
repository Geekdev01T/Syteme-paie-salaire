<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateFilterRequest extends FormRequest
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
            "month" => "nullable|before_or_equal:now",
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'month.before_or_equal' => 'The month must be before or equal to the current month.',
        ];
    }
}
