<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtatRetardRequest extends FormRequest
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
            'date' => 'required|date|before:tomorrow|unique:etat_retards,date,NULL,id,employer_id,' . $this->employer_id,
            'hour'=> 'required|integer|min:1|max:20',
            'comment' => 'nullable|string|max:500',
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
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date.',
            'date.before' => 'The date must be before tomorrow.',
            'date.unique' => 'This employee already has a record for this date.',
            'hour.required' => 'The hour is required.',
            'hour.integer' => 'The hour must be an integer.',
            'hour.min' => 'The hour must be at least 1.',
            'hour.max' => 'The hour may not be greater than 30.',
            'comment.string' => 'The comment must be a string.',
            'comment.max' => 'The comment may not be greater than 500 characters.',
            'employer_id.required' => 'The employer ID is required.',
            'employer_id.exists' => 'The selected employer does not exist.',
        ];
    }
}
