<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtatRequest extends FormRequest
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
            'date' => 'required|date|before:tomorrow',
            'hour' => 'nullable|integer|min:1|max:10',
            'state' => 'required|in:study,supervised-work,monitoring',
            'employer_id' => 'required|exists:employers,id',
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
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'date.before' => 'The date must be before tomorrow.',
            'hour.integer' => 'The hour must be an integer.',
            'hour.min' => 'The hour must be at least 1.',
            'hour.max' => 'The hour may not be greater than 10.',
            'state.required' => 'The state field is required.',
            'state.in' => 'The selected state is invalid.',
            'employer_id.required' => 'The employer field is required.',
            'employer_id.exists' => 'The selected employer does not exist.',
        ];
    }
}
