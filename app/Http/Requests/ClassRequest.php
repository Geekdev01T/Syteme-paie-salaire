<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            "name" => "required|string|min:3|unique:classes,name",
            "section" => "required|in:french,english",
        ];
    }

    //function pour personnaliser les messages d'erreur
    public function messages(): array
    {
        return [
            'name.required' => 'The class name is required.',
            'name.string' => 'The class name must be a string.',
            'name.min' => 'The class name must be at least 3 characters.',
            'name.unique' => 'This class name is already in use.',
            'section.required' => 'The class section is required.',
            'section.in' => 'The section must be either french or english.',
        ];
    }
}
