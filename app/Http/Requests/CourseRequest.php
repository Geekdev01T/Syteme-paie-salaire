<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            // "name"=> "required|string|min:3|unique:cours,name,NULL,id,departement_id," . $this->departement_id,
            "name" => "required|string|min:3|unique:cours,name",
            "code"=>"required|string|min:3",
            "departement_id" => "required|exists:departements,id",
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
            'name.required' => 'The course name is required.',
            'name.unique' => 'This course already has a record for one department',
            'name.string' => 'The course name must be a string.',
            'name.min' => 'The course name must be at least 3.',
            'code.required' => 'The course code is required.',
            'code.string' => 'The course code must be a string.',
            'code.min' => 'The course code must be at least 3.',
            'departement_id.required' => 'The course department is required.',
            'departement_id.exists' => 'The selected department does not exist.',
        ];
    }
}
