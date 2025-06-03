<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'name' => 'required|string|min:4|unique:departements,name',
            'code' => 'required|string|min:2|unique:departements,code',
            'description' => 'required|string|max:1000',
            'section' => 'required|in:french,english',
            // Ajoutez d'autres règles de validation si nécessaire
        ];
    }

    //function pour personnaliser les messages d'erreur
    public function messages(): array
    {
        return [
            'name.required' => 'The department name is required.',
            'name.string' => 'The department name must be a string.',
            'name.min' => 'The department name must be at least 4 characters.',
            'name.unique' => 'This department name is already in use.',
            'code.required' => 'The department code is required.',
            'code.string' => 'The department code must be a string.',
            'code.min' => 'The department code must be at least 2 characters.',
            'code.unique' => 'This department code is already in use.',
            'description.required' => 'The department description is required.',
            'description.string' => 'The description must be a string.',
            'section.required' => 'The department section is required.',
            'section.in' => 'The section must be either french or english.',
        ];
    }
}
